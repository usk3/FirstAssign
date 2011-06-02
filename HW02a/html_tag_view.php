<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>My Second Part-A HomeWork page</title>
</head>
<body>

<?php
//function to validate the globals tags passed, are string, not numeric.
function validate_global_tags($_vararray){
	try{
		foreach($_vararray as $key => $value){
			if(is_int($value) || is_int($key)){
				echo '<br>';
				print "Invalid value, Expected String but found Numeric:$key:$value ";
				echo '<br>';
				return -1;
			}
			if(strcmp(strtolower($key), "contenteditable")==0){
				if (strcmp(strtolower($value), "true")!=0 || strcmp(strtolower($value), "false")!=0 ){
					echo '<br>';
					print "Invalid value, Expected a boolean,true or false value: $key:$value ";
					echo '<br>';
					return -1;
				}
			}
			if(strcmp(strtolower($key), "dir")==0){
				if (strcmp(strtolower($value), "ltr")!=0 || strcmp(strtolower($value), "rtl")!=0 ){
					echo '<br>';
					print "Invalid value, Expected ltr or rtl: $key:$value ";
					echo '<br>';
					return -1;
				}
			}
			if(strcmp(strtolower($key), "draggable")==0){
				if (strcmp(strtolower($value), "true")!=0 || strcmp(strtolower($value), "false")!=0  || strcmp(strtolower($value), "auto")!=0){
					echo '<br>';
					print "Invalid value, Expected true, false or auto: $key:$value ";
					echo '<br>';
					return -1;
				}
			}
			if(strcmp(strtolower($key), "hidden")==0){
				if (strcmp(strtolower($value), "hidden")!=0){
					echo '<br>';
					print "Invalid value, Expected hidden : $key:$value ";
					echo '<br>';
					return -1;
				}
			}
			if(strcmp(strtolower($key), "spellcheck")==0){
				if (strcmp(strtolower($value), "true")!=0 || strcmp(strtolower($value), "false")!=0){
					echo '<br>';
					print "Invalid value, Expected true or false : $key:$value ";
					echo '<br>';
					return -1;
				}
			}
			return 0;
		}
	}catch(Exception $e){
		print $e->getMessage();
	}
}

// build a generic tag function
function build_tag($_tagName,$_vararray,$_var){
	$tag = "";
	$a_tag = "";
	try{
		if(is_array($_var)){
			return build_list_tag($_tagName, $_vararray, $_var);
		}
		if (strcmp(strtolower($_tagName),"doctype") == 0){
			return "<!DOCTYPE HTML>";
		}
		foreach($_vararray as $key => $value){
			$tag .= $key.'='.$value.' ';
			if(strcmp(strtolower($key),"cite") == 0 && strcmp(strtolower($_tagName),"blockquote") == 0){
				$a_tag = "<p> Here is the quote from ".$value;
			}
		}
		if(strcmp(strtolower($_tagName),"blockquote") == 0){
			$a_tag .= '<'.$_tagName.' '.$tag.'>'."$_var"."</".$_tagName.'>'."</p>" ;
		}
		elseif (strcmp(strtolower($_tagName),"linebreak") == 0){
			$a_tag = "<br>";
		}elseif (strcmp(strtolower($_tagName),"form") == 0){
			$a_tag = '<'.$_tagName.' '.$tag.'>';
			$a_tag .= "First Name: <input type='text' name='fname' value='Usha' /><br />";
			$a_tag .= "Last name:<input type='text' name='lname' value='Karri' /><br />";
			$a_tag .= "<input type='submit' value='Submit' />";
			$a_tag .= "</".$_tagName.'>';
		}elseif (strcmp(strtolower($_tagName),"span") == 0){
			$a_tag .= "<p>The grass is ";
			$a_tag .= '<'.$_tagName.' '.$tag.'>';
			$a_tag .= "$_var";
			$a_tag .= "</".$_tagName.'>';
			$a_tag .= "</p>";
		}elseif (strcmp(strtolower($_tagName),"details") == 0){
			$sum_tag = build_tag("summary","", "CopyRight 2011");
			$p_tag = build_tag("p", "","Do not copy this source code.");
			$a_tag = '<'.$_tagName.$sum_tag.$p_tag."</".$_tagName.'>';
		}
		else {
			$a_tag = '<'.$_tagName.' '.$tag.'>'."$_var"."</".$_tagName.'>';
		}
		return $a_tag;
	}catch (Exception $e){
		print $e->getMessage();
	}
}

// build a generic list tag function
function build_list_tag($_tagName,$_vararray,$_contentarray){
	$tag = "";
	$a_tag = "";
	try{
		foreach($_vararray as $key => $value){
			$tag .= $key.'='.$value.' ';
		}
		$a_tag = '<'.$_tagName.' '.$tag.'>';
		if((strcmp(trim($_tagName, "menu")) == 0) || (strcmp(trim($_tagName, "ol")) ==0) || (strcmp(trim($_tagName, "ul")) == 0)){
			foreach($_contentarray as $list){
				$l_tag .= build_tag("li","",$list);
			}
		}elseif(strcmp(trim($_tagName, "nav")) == 0){
			foreach($_contentarray as $lt){
				$l_tag .= build_tag("a",$tag,$lt);
			}
		}elseif(strcmp(trim($_tagName, "dl")) == 0){
			foreach($_contentarray as $lt){
				$l_tag .= build_tag("dt",$tag,$lt);
			}
		}
		$a_tag .= $l_tag."</".$_tagName.'>';
		return $a_tag;
	}catch (Exception $e){
		print $e->getMessage();
	}
}

$a_array = array("style"=>"color:pink;");
$status = validate_global_tags($a_array);
//call for div tag
if($status == 0){
	$tag = build_tag("header",$a_array, "Welcome to HTML tag generation page.");
	echo "$tag";
	echo '<br>';
}
//call build_tag function.

$h1_tag_array = array("title"=>"Array Test","id"=>"h_id","style"=>"color:green;");
$status = validate_global_tags($h1_tag_array);
echo '<br>';
// call build_tag function only if global-tag is passed.
// check for return status.
// Build specific tags taking in the tagname.
if($status == 0){
	$h1_tag = build_tag("h1",$h1_tag_array, "This is Header1.");
	echo "$h1_tag";
	echo '<br>';
}
if($status == 0){
	$h1_tag = build_tag("h2",$h1_tag_array, "This is Header2.");
	echo "$h1_tag";
	echo '<br>';
}
if($status == 0){
	$h1_tag = build_tag("h3",$h1_tag_array, "This is Header3.");
	echo "$h1_tag";
	echo '<br>';
}
if($status == 0){
	$h1_tag = build_tag("h4",$h1_tag_array, "This is Header4.");
	echo "$h1_tag";
	echo '<br>';
}
if($status == 0){
	$h1_tag = build_tag("h5",$h1_tag_array, "This is Header5.");
	echo "$h1_tag";
	echo '<br>';
}
if($status == 0){
	$h1_tag = build_tag("h6",$h1_tag_array, "This is Header6.");
	echo "$h1_tag";
	echo '<br>';
}

//call for body tag
if($status == 0){
	$body_tag = build_tag("body",$h1_tag_array, "This is to test body tag.");
	echo "$body_tag";
	echo '<br>';
}


//call for <a>
$a_tag_array = array("href"=>"http://www.google.com","target"=>"_top");
$status = validate_global_tags($a_tag_array);
echo '<br>';
if($status == 0){
	$tag = build_tag("A",$a_tag_array, "A link:");
	echo "$tag";
	echo '<br>';
}

//call for <address>
$addr_tag_array = array("style"=>"color:grey;");
$status = validate_global_tags($addr_tag_array);
echo '<br>';
if($status == 0){
	$tag = build_tag("address",$addr_tag_array, "Author:Usha Karri,123 street.USA");
	echo "$tag";
	echo '<br>';
}


//call for <blockquote>
$bq_tag_array = array("cite"=>"http://www.savetherainforest.org");
$status = validate_global_tags($bq_tag_array);
echo '<br>';
if($status == 0){
	$tag = build_tag("blockquote",$bq_tag_array, "If you are thinking 1 year ahead, sow seeds.
	If you are thinking 10 years ahead, plant a tree. 
	If you are thinking 100 years ahead, educate the people.");
	echo "$tag";
	echo '<br>';
}

//call for DOCTYPE tag
$tag = build_tag("doctype","", "");
echo "$tag";
echo '<br>';

//call for break tag
$t_array = array("style"=>"color:grey;");
$status = validate_global_tags($t_array);
if($status == 0){
	$break_tag = build_tag("linebreak",$t_array, "line break");
	echo "line break:";
	echo "$break_tag";
}

$g_array = array("style"=>"color:blue;");
$status = validate_global_tags($g_array);
//call for div tag
if($status == 0){
	$div_tag = build_tag("div",$g_array, "This is a paragraph in a section.");
	echo "$div_tag";
	echo '<br>';
}

$tt_array = array("style"=>"color:blue;");
$status = validate_global_tags($tt_array);
//call for div tag
if($status == 0){
	$tag = build_tag("footer",$tt_array, "Page Last Updated on 5/20/2011.");
	echo "$tag";
	echo '<br>';
}

$aa_array = array("style"=>"color:magenta;","title"=>"Tag generation program");
$status = validate_global_tags($aa_array);
//call for div tag
if($status == 0){
	$tag = build_tag("head",$aa_array, "");
	echo "$tag";
	echo '<br>';
}

//call for <html>
$html_tag_array = array("hidden"=>100);
echo "Showcasing an Exception in value scenario :";
echo '<br>';
$status = validate_global_tags($html_tag_array);
echo '<br>';
if($status == 0){
	$tag = build_tag("form",$html_tag_array, "");
	echo "$tag";
	echo '<br>';
}

//call for <ol>
$ol_tag_array = array("style"=>"color:pink;", "value"=>"2");
echo '<br>';
$status = validate_global_tags($ol_tag_array);
echo '<br>';
if($status == 0){
	$list = array("html", "php");
	$tag = build_tag("ol",$ol_tag_array, $list);
	echo "Example of ordered list";
	echo "$tag";
	echo '<br>';
}
//call for <ul>
$ul_tag_array = array("style"=>"color:pink;");
echo '<br>';
$status = validate_global_tags($ul_tag_array);
echo '<br>';
if($status == 0){
	$llist = array("java", "jsf");
	$tag = build_tag("ul",$ul_tag_array, $llist);
	echo "Example of un-ordered list";
	echo "$tag";
	echo '<br>';
}

//call for <form>
$form_tag_array = array("action"=>"response.php","name"=>"name_form");
$status = validate_global_tags($form_tag_array);
echo '<br>';
if($status == 0){
	$tag = build_tag("form",$form_tag_array, "");
	echo "$tag";
	echo '<br>';
}

//call for <p>
$p_tag_array = array("style"=>"font:Bold,color:yellow;");
$status = validate_global_tags($p_tag_array);
echo '<br>';
if($status == 0){
	$tag = build_tag("p",$p_tag_array, "This is paragraph tag.");
	echo "$tag";
	echo '<br>';
}

//call for <span>
$sp_tag_array = array("style"=>"color:green;");
echo '<br>';
if($status == 0){
	$tag = build_tag("span",$sp_tag_array, "green");
	echo "$tag";
	echo '<br>';
}


//call for <section>
$tag = build_tag("section","", "This is section tag");
echo "$tag";
echo '<br>';

//call for <style>
$sp_tag_array = array("scope"=>"scoped","type"=>"text/css");
echo '<br>';
if($status == 0){
	$tag = build_tag("style",$sp_tag_array, "p {color:blue}");
	echo "$tag";
	echo '<br>';
}


//call for <link>
$link_tag_array = array("rel"=>"stylesheet","type"=>"text/css","href"=>"mystyle.css");
echo '<br>';
if($status == 0){
	echo "A link to mystyle.css";
	$tag = build_tag("style",$link_tag_array, "");
	echo "$tag";
	echo '<br>';
}

//call for <menu>
$menu_tag_array = array("label"=>"fruits-menu","type"=>"toolbar");
echo '<br>';
if($status == 0){
	echo "Fruits menu list:";
	$list = array("Apple","Banana","Grapes");
	$tag = build_tag("menu",$menu_tag_array, $list);
	echo "$tag";
	echo '<br>';
}
//call for <summary>
$tag = build_tag("summary","", "This is summary tag");
echo "$tag";
echo '<br>';

//call for <details>
$tag = build_tag("details","details_tag_array", "here are details.");
echo "$tag";
echo '<br>';

//call for <title>
$tag = build_tag("title","", "The title is HTML tag generation program.");
echo "$tag";
echo '<br>';

//call for <nav>
$nav_tag_array = array("href"=>"Previous.php");
echo '<br>';
if($status == 0){
	echo "navigate here:";
	$list = array("Previous","Next");
	$tag = build_tag("nav",$nav_tag_array, $list);
	echo "$tag";
	echo '<br>';
}

//call for <dl>
$dl_tag_array = array("style"=>"color:orange;");
echo '<br>';
if($status == 0){
	echo "Definition list";
	$list = array("Coffee","Tea");
	$tag = build_tag("dl",$dl_tag_array, $list);
	echo "$tag";
	echo '<br>';
}

//call for <describe the list>
$dt_tag_array = array("style"=>"color:brown;");
echo '<br>';
if($status == 0){
	echo "Describes list";
	$list = array("French Vanilla","Apple Cinnamon Tea");
	$tag = build_tag("dt",$dt_tag_array, $list);
	echo '<br>';
	echo "$tag";
}

//call for <dfn>
$dfn_tag_array = array("style"=>"color:purple;");
echo '<br>';
if($status == 0){
	$tag = build_tag("dfn",$dfn_tag_array, "This is definition Term Tag");
	echo '<br>';
	echo "$tag";
}

//call for <meta>
$meta_tag_array = array("name"=>"keywords","content"=>"HTML, CSS, XML, XHTML, JavaScript");
echo '<br>';
if($status == 0){
	$tag = build_tag("meta",$meta_tag_array, "");
	echo '<br>';
	echo "$tag";
}
//call for <article>
$art_tag_array = array("style"=>"color:blue;");
$status = validate_global_tags($art_tag_array);
echo '<br>';
if($status == 0){
	$tag = build_tag("article",$art_tag_array, "Refer to Article on : <a href='http://www.w3schools.com/html5/default.asp'> HTML tag Reference.");
	echo "$tag";
	echo '<br>';
}

?>
</body>
</html>
