<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>My Second Part-A HomeWork page</title>

<!--  php class included -->
<?php include ("build_tag_lib.php");?>
</head>
<body>

<?php

$taglib = new build_tag_lib();

//build h1 tag
$h1_tag_array = array("title"=>"Array Test","style"=>"color:green;");
$taglib->buildTag("h1",$h1_tag_array, "This is Header1.");
$tag = $taglib->getHtmlTag();
echo "$tag";

//build h2 tag
$h1_tag_array = array("title"=>"Array Test","style"=>"color:green;");
$taglib->buildTag("h2",$h1_tag_array, "This is Header2.");
$tag = $taglib->getHtmlTag();
echo "$tag";

//build h1 tag
$h1_tag_array = array("title"=>"Array Test","style"=>"color:green;");
$taglib->buildTag("h3",$h1_tag_array, "This is Header3.");
$tag = $taglib->getHtmlTag();
echo "$tag";

//build h1 tag
$h1_tag_array = array("title"=>"Array Test","style"=>"color:green;");
$taglib->buildTag("h4",$h1_tag_array, "This is Header4.");
$tag = $taglib->getHtmlTag();
echo "$tag";

//build h1 tag
$h1_tag_array = array("title"=>"Array Test","style"=>"color:green;");
$taglib->buildTag("h5",$h1_tag_array, "This is Header5.");
$tag = $taglib->getHtmlTag();
echo "$tag";

//build h1 tag
$h1_tag_array = array("title"=>"Array Test","style"=>"color:green;");
$taglib->buildTag("h6",$h1_tag_array, "This is Header6.");
$tag = $taglib->getHtmlTag();
echo "$tag";

//build DOCTYPE tag
$taglib->buildTag("!DOCTYPE","", "");
$tag = $taglib->getHtmlTag();
echo "$tag";

// build a style
$style_tag_array = array("scope"=>"scoped","type"=>"text/css");
$taglib->buildTag("style",$style_tag_array, "p {color:blue}");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo "<br>";

// build a line break
echo "Here is line break:";
$taglib->buildTag("br","", "");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo "After link break";

//call for <a>
$a_tag_array = array("href"=>"http://www.google.com","target"=>"_top");
$taglib->buildTag("A",$a_tag_array, "A link:");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <address>
$addr_tag_array = array("style"=>"color:grey;");
$taglib->buildTag("address",$a_tag_array, "Author:Usha Karri,123 street.USA");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <body>
$taglib->buildTag("body","", "");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <head>
$taglib->buildTag("head","", "");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <html>
$taglib->buildTag("html","", "");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <header>
$hdr_array = array("style"=>"color:pink;");
echo "Header Section:";
$taglib->buildTag("header",$hdr_array, "Welcome to HTML tag generation page");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <div>
$div_array = array("style"=>"color:blue;");
$taglib->buildTag("div",$div_tag_array,"This is a paragraph in a section.");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <section>
$sec_array = array("style"=>"color:blue;");
$taglib->buildTag("section",$sec_tag_array,"This is section tag.");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <summary>
$taglib->buildTag("summary","","This is summary tag.");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';


//call for <details>
$taglib->buildTag("details","","Here are details");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <span>
$sp_tag_array = array("style"=>"color:green;");
echo "The grass is ";
$taglib->buildTag("span",$sp_tag_array,"green");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';


//call for <nav>
$nav_tag_array = array("href"=>"Previous.php");
$taglib->buildTag("nav",$nav_tag_array,"Go to Previous Page");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';
	
//call for <ol>
$ol_tag_array = array("value"=>"2");
$list = array("html", "php");
$taglib->buildTag("ol",$ol_tag_array,$list);
$tag = $taglib->getHtmlTag();
echo "Ordered List:";
echo "$tag";
echo '<br>';


//call for menu
$menu_tag_array = array("label"=>"fruits-menu","type"=>"toolbar");
$list = array("Apple","Banana","Grapes");
$taglib->buildTag("menu",$menu_tag_array,$list);
$tag = $taglib->getHtmlTag();
echo "Menu:";
echo "$tag";
echo '<br>';

//call for title
$taglib->buildTag("title",$menu_tag_array,"Title is HTML lib generation page");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <dl>
$dl_tag_array = array("style"=>"color:orange;");
$list = array("Coffee","Tea");
$taglib->buildTag("dl",$dl_tag_array,$list);
$tag = $taglib->getHtmlTag();
echo "Definition List:";
echo "$tag";
echo '<br>';


//call for blockquote
$bq_tag_array = array("style"=>"color:black;","cite"=>"http://www.savetherainforest.org");
$taglib->buildTag("blockquote",$bq_tag_array,"If you are thinking 1 year ahead, sow seeds.
	If you are thinking 10 years ahead, plant a tree. 
	If you are thinking 100 years ahead, educate the people.");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for form
$form_tag_array = array("action"=>"response.php","name"=>"name_form","style"=>"color:red;");
$taglib->buildTag("form",$form_tag_array,"Geographical Data Entry Form:");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <meta>
$form_tag_array = array("name"=>"author","context"=>"Usha Karri");
$taglib->buildTag("form",$form_tag_array,"Meta Data");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <p>
$taglib->buildTag("p","","Object Oriented Soft Dev");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <dfn>
$taglib->buildTag("dfn","","Definition Term");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';



//call for <footer>
$footer_tag_array = array("style"=>"color:blue;");
$taglib->buildTag("footer",$footer_tag_array,"Page Last Updated on 6/4/2011.");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';

//call for <article>
$art_tag_array = array("style"=>"color:blue;");
$taglib->buildTag("article",$art_tag_array, "Refer to Article on : <a href='http://www.w3schools.com/html5/default.asp'> HTML tag Reference.");
$tag = $taglib->getHtmlTag();
echo "$tag";
echo '<br>';



?>
</body>
</html>
