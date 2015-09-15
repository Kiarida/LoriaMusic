<?php

/* JMSDebuggingBundle:Collector:security.html.twig */
class __TwigTemplate_d77bbd69a8c800fbf0747114b7990055233c80622fe5f8ba0c6ed9a2c1735608 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SecurityBundle:Collector:security.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SecurityBundle:Collector:security.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_panel($context, array $blocks = array())
    {
        // line 4
        echo "\t";
        $this->displayParentBlock("panel", $context, $blocks);
        echo "

\t<style type=\"text/css\">
\t\t#collector_content tr.security-match > td {
\t\t\tbackground-color: #f1f1f1;
\t\t\tborder-bottom: 2px solid #000;
\t\t}

\t\t#collector_content .security-attr {
\t\t\tfloat: right;
\t\t\tfont-size:11px;
\t\t}
\t</style>

\t<div class=\"security-attr\">
\t\tprovided by <a href=\"https://github.com/schmittjoh/JMSDebuggingBundle\">JMSDebuggingBundle</a>
\t</div>

\t<h3 style=\"margin-bottom:0px;\">Firewall</h3>

\t<table>
\t\t<tr>
\t\t\t<th>Contexts</th>
\t\t\t<td>
\t\t\t\t<table class=\"foo\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Pos</th>
\t\t\t\t\t\t\t<th>Name</th>
\t\t\t\t\t\t\t<th>Matches?</th>
\t\t\t\t\t\t\t<th><abbr title=\"Why didn't it match?\">Reason</abbr></th>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "contextTrace", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["id"] => $context["match"]) {
            // line 39
            echo "\t\t\t\t\t\t<tr";
            if ($this->getAttribute($context["match"], "matches", array())) {
                echo " class=\"security-match\"";
            }
            echo ">
\t\t\t\t\t\t\t<td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>";
            // line 41
            echo twig_escape_filter($this->env, $context["id"], "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>";
            // line 42
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["match"], "matches", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["match"], "reason", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['match'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</td>
\t\t</tr>
\t\t<tr
\t\t<tr>
\t\t\t<th>Listeners</th>
\t\t\t<td>
\t\t\t\t<table>
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>Pos</th>
\t\t\t\t\t\t\t<th>Class</th>
\t\t\t\t\t\t\t<th>Called</th>
\t\t\t\t\t\t\t<th><abbr title=\"Authentication handled?\">Handled?</abbr></th>
\t\t\t\t\t\t\t<th><abbr title=\"Why was it not handled?\">Reason</abbr></th>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 65
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["collector"]) ? $context["collector"] : $this->getContext($context, "collector")), "listeners", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["listener"]) {
            // line 66
            echo "\t\t\t\t\t\t<tr";
            if ($this->getAttribute($context["listener"], "handled", array())) {
                echo " class=\"security-match\"";
            }
            echo ">
\t\t\t\t\t\t\t<td>";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td><abbr title=\"";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["listener"], "class", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["listener"], "short_name", array()), "html", null, true);
            echo "</abbr></td>
\t\t\t\t\t\t\t<td>";
            // line 69
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["listener"], "called", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>";
            // line 70
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($context["listener"], "handled", array())), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td>";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($context["listener"], "reason", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['listener'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</td>
\t\t</tr>
\t</table>
";
    }

    public function getTemplateName()
    {
        return "JMSDebuggingBundle:Collector:security.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 74,  193 => 71,  189 => 70,  185 => 69,  179 => 68,  175 => 67,  168 => 66,  151 => 65,  130 => 46,  113 => 43,  109 => 42,  105 => 41,  101 => 40,  94 => 39,  77 => 38,  39 => 4,  36 => 3,  11 => 1,);
    }
}
