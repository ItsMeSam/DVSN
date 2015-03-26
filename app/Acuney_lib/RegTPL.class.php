<?php

namespace Acuney\View;

class RegTPL 
{
	/*
	* @param {string} directory
	*/
	public $directory;

	/*
	* @param {string} cachedir
	*/
	public $cachedir;

	/* 
	* @param {array} variables
	*/
	public $variables;


	/*
	* @param {string} directory 
	*/
	public function setDirectory($directory)
	{
		if ( substr($directory, -1) != "/" )
		{
			$directory .= "/";
		}

		if ( file_exists($directory) ) 
		{
			$this->directory = $directory;
			return true;
		}
		else
		{
			mkdir($directory);
			$this->directory = $directory;
		}

		return true;
	}

	public function setCacheDirectory($directory)
	{
		if ( substr($directory, -1) != "/" )
		{
			$directory .= "/";
		}

		if ( file_exists($directory) )
		{
			$this->cachedir = $directory;
		}
		else
		{
			 mkdir($directory);
			 $this->cachedir = $directory;
		}

		return true;
	}

	/*
	* @param {string} name 
	* @param {string} value
	*/
	public function addVar($name, $value)
	{
		if ( $this->variables[$name] = $value )
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	/*
	* @param {string} filename
	*/
	public function parse($filename)
	{
		//.. Search for file
		if ( file_exists($this->directory . $filename . ".html" ) )
		{
			$filename .= ".html";
		}
		elseif ( file_exists($this->directory . $filename . ".tpl" ) )
		{
			$filename .= ".tpl";
		}
		elseif ( !file_exists($this->directory . $filename) )
		{
			trigger_error('RegTPL error: template file doesn\'t exist');
			return false;
		}


		$contents = file_get_contents($this->directory . $filename);

		//.. Parse comments
		$contents = preg_replace("/{{\*(.*)\*}}/", '', $contents);


		//.. Parse foreach loop
		preg_match_all("/{{- (.*) -}}/", $contents, $var);
		foreach($var[1] as $v)
		{
			$contents = preg_replace("/{{- (.*) -}}/", '<?php foreach($this->variables[\'' . $v . '\'] as $value): ?>', $contents, 1);;
		}

		$contents = preg_replace("/{{-end-}}/", '<?php endforeach; ?>', $contents);

		//.. Parse foreach loop variables
		preg_match_all("/{{ -(.*)- }}/", $contents, $var);
		foreach($var[1] as $v)
		{
			$contents = preg_replace("/{{ -(.*)- }}/", '<?php echo $' . $v . '; ?>', $contents);
		}

		//.. Parse variables
		preg_match_all("/{{ (.*) }}/", $contents, $var);
		foreach($var[1] as $v)
		{
			if ( isset( $this->variables[$v] ) )
			{
				$contents = preg_replace("/{{ (.*) }}/", "<?php echo \"" . addslashes($this->variables[$v]) . "\"; ?>", $contents, 1);
			}
			else
			{
				trigger_error('RegTPL error: variable used in template file doesn\'t exist');
			}
		}

		//.. Parse foreach loop
		preg_match_all("/{{- (.*) -}}/", $contents, $var);
		foreach($var[1] as $v)
		{
			$contents = preg_replace("/{{- (.*) -}}/", '<?php foreach($this->variables[\'' . $v . '\'] as $this->variables[\'value\']): ?>', $contents, 1);;
		}

		$contents = preg_replace("/{{-end-}}/", '<?php endforeach; unset($this->variables[\'value\']); ?>', $contents);


		//.. Parse constants
		preg_match_all("/{{# (.*) #}}/", $contents, $constants);
		foreach($constants[1] as $c)
		{
			if ( defined($c) )
			{
				$contents = preg_replace("/{{# (.*) #}}/", "<?php echo " . $c . "; ?>", $contents, 1);
			}
			else
			{
				trigger_error('RegTPL error: constant used in template file doesn\'t exist');
			}
		}

		//.. Parse PHP code
		preg_match_all("/{{. (.*) .}}/", $contents, $functions);
		foreach($functions[1] as $f)
		{
			$contents = preg_replace("/{{. (.*) .}}/", "<?php " . $f . " ?>", $contents, 1);
		}

		//.. Parse include
		preg_match_all("/{{-include\|(.*)-}}/", $contents, $include);
		foreach($include[1] as $i)
		{
			$contents = preg_replace("/{{-include\|(.*)-}}/", "<?php include \"" . $this->directory . $i . "\"; ?>", $contents, 1);
		}

		fopen($this->cachedir . $filename . ".cache.php", "w");
		file_put_contents($this->cachedir . $filename . ".cache.php", $contents);
	}	

	public function display($filename)
	{
		if(file_exists($this->cachedir . $filename . ".cache.php"))
		{
			include $this->cachedir . $filename . ".cache.php";
		}
	}
}