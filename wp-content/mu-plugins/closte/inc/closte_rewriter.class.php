<?php
defined('ABSPATH') OR exit;

class Closte_Rewriter
{
	var $blog_url = null; // origin URL
	var $cdn_url = null; // CDN URL

	var $dirs = null; // included directories
	var $excludes = array(); // excludes
	
    var $cdnRewriteExtensions = array(
    '.aac','.css','.eot','.gif','.jpeg','.js','.jpg','.less','.mp3','.mp4',
    '.ogg','.otf','.pdf','.png','.ttf','.woff' ,'.pdf' ,'.txt','.webp', '.csv' ,'.swf' ,'.woff2' ,'.doc',
    '.ppt', '.tif','.xls','.docx','.pptx','.tiff','.xlsx'    
    );



	function __construct($blog_url, $cdn_url, $dirs, array $excludes) {
		$this->blog_url = $blog_url;
		$this->cdn_url = $cdn_url;
		$this->dirs	= $dirs;
		$this->excludes = $excludes;
	

	}




	protected function exclude_asset(&$asset) {

		foreach ($this->excludes as $exclude) {
			if (!!$exclude && stristr($asset, $exclude) != false) {
				return true;
			}
		}
		return false;
	}


    protected function check_end($str, $ends)
    {
        foreach ($ends as $try) {
            if (substr($str, -1*strlen($try))===$try) return $try;
        }
        return false;
    }


    protected function rewrite_url($asset) {

       



        if ($this->exclude_asset($asset[0])) {
            return $asset[0];
        }


        try{
            
            ///wp-content/uploads/2018/12/bla.jpg 779w

            $no_ws = explode(' ', $asset[0])[0];
            $no_qs = explode('?', $no_ws)[0];

            if($this->check_end($no_qs,$this->cdnRewriteExtensions) == false){               
                return $asset[0];
            }         
            
        }
        catch(Exception $e){
            return $asset[0];
        }

        if ( is_admin_bar_showing()
                and array_key_exists('preview', $_GET)
                and $_GET['preview'] == 'true' )
        {
            return $asset[0];
        }

        $blog_url = $this->relative_url($this->blog_url);
        $subst_urls =  [
                'http:'.$blog_url,
                'https:'.$blog_url,
            ];




        if (strpos($asset[0], '//') === 0) {
            return str_replace($blog_url, $this->cdn_url, $asset[0]);
        }


        if (strstr($asset[0], $blog_url)) {
            return str_replace($subst_urls, $this->cdn_url, $asset[0]);
        }


        return $this->cdn_url . $asset[0];
    }


    protected function relative_url($url) {
        return substr($url, strpos($url, '//'));
    }



	protected function get_dir_scope() {
		$input = explode(',', $this->dirs);

        // default
		if ($this->dirs == '' || count($input) < 1) {
			return 'wp\-content|wp\-includes';
		}

		return implode('|', array_map('quotemeta', array_map('trim', $input)));
	}




    public function rewrite($html) {

        $dirs = $this->get_dir_scope();
        $blog_url = '(https?:|)'.$this->relative_url(quotemeta($this->blog_url));
        $regex_rule = '#(?<=[(\"\'])(?:'.$blog_url.')?';      
        $regex_rule .= '/(?:((?:'.$dirs.')[^\"\')]+)|([^/\"\']+\.[^/\"\')]+))(?=[\"\')])#';
        $cdn_html = preg_replace_callback($regex_rule, [&$this, 'rewrite_url'], $html);
        return $cdn_html;

    }
}