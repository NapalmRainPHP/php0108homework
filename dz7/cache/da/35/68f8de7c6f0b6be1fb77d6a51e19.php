<?php

/* index.twig */
class __TwigTemplate_da3568f8de7c6f0b6be1fb77d6a51e19 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <link href='template/css/style.css' rel='stylesheet' type='text/css'>
    <meta name=\"Keywords\" content=\"{*KEYWORDS*}\">
    <meta name=\"Description\" content=\"{*DESCRIPTION*}\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"author\" content=\"Алексеев Николай (Rain...)\">
    <meta name=\"copyright\" content=\"Rain Global Studio\">
    <meta name=\"document-state\" content=\"dynamic\">
    <meta name=\"revezit-after\" content=\"1 deys\">
\t<title>";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
\t<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
\t<header>
\t\t<h2>";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["header"]) ? $context["header"] : null), "html", null, true);
        echo "</h2>
\t</header>
\t<section>
\t\t";
        // line 21
        $this->displayBlock('content', $context, $blocks);
        // line 23
        echo "\t</section>
\t<footer>

\t</footer>
\t<script type='text/javascript' src='{*MAIN_URL*}/scripts/jquery.js'></script>
\t<script type='text/javascript' src='{*MAIN_URL*}/scripts/script.js'></script>
</body>
</html>";
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "\t\t";
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 22,  59 => 21,  48 => 23,  46 => 21,  40 => 18,  32 => 13,  18 => 1,  50 => 9,  37 => 7,  33 => 6,  29 => 4,  26 => 3,);
    }
}
