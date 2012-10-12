<?php

/* DauDauBundle:Dau:annDetails.html.twig */
class __TwigTemplate_0f31800ad9797cfd72f449dd4fc35234 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'homepage_middle' => array($this, 'block_homepage_middle'),
            'homepage_search' => array($this, 'block_homepage_search'),
            'homepage_last_announcements' => array($this, 'block_homepage_last_announcements'),
            'javascripts_after' => array($this, 'block_javascripts_after'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'main_block' => array($this, 'block_main_block'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "page_title"), "html", null, true);
    }

    // line 4
    public function block_keywords($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "keywords"), "html", null, true);
    }

    // line 5
    public function block_description($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "seo"), "description"), "html", null, true);
    }

    // line 7
    public function block_homepage_middle($context, array $blocks = array())
    {
    }

    // line 8
    public function block_homepage_search($context, array $blocks = array())
    {
    }

    // line 9
    public function block_homepage_last_announcements($context, array $blocks = array())
    {
    }

    // line 10
    public function block_javascripts_after($context, array $blocks = array())
    {
        // line 11
        echo "    <script src=\"/js/jquery.lightbox-0.5.js\" type=\"text/javascript\"></script>
";
    }

    // line 13
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"/css/jquery.lightbox.css\" type=\"text/css\" rel=\"stylesheet\" />
";
    }

    // line 18
    public function block_main_block($context, array $blocks = array())
    {
        // line 19
        echo "    <div class=\"sep\"></div>
    <div class=\"breadcrumb\" itemscope itemtype=\"http://schema.org/WebPage\">
        <span itemprop=\"breadcrumb\">
            ";
        // line 22
        echo $this->getAttribute($this->getContext($context, "seo"), "breadcrumb");
        echo "
        </span>
    </div>
    <div class=\"sep\"></div>
    <a href=\"javascript:;\" onclick=\"history.back();return false;\"><< Inapoi</a>
    <div class=\"sep\"></div>
    <div class=\"sep\"></div>
    <div itemscope itemtype=\"http://schema.org/ApartmentComplex\">
        <h1 class=\"left\" itemprop=\"name\">";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->getAttribute($this->getContext($context, "dau_details"), "title")), "html", null, true);
        echo "</h1>
        <div class=\"font12 italic right textRight\">
            ";
        // line 32
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "added"), "Y-m-d H:i:s"), "html", null, true);
        echo "
            <br />
            <span class=\"font11\">(";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->days_ago(twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "added"), "Y-m-d H:i:s")), "html", null, true);
        echo ")</span>
        </div>
        <div class=\"sep\"></div>
        ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "photos"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 38
            echo "            <a href=\"/uploads/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "getPhotoPath"), "html", null, true);
            echo "\" class=\"gallery_photo\"><img itemprop=\"photo\" src=\"/uploads/th_";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "item"), "getPhotoPath"), "html", null, true);
            echo "\"></a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 40
        echo "        <div class=\"sep\"></div>
        <div class=\"ann_body\" itemprop=\"description\">
            ";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('website_extension')->stripslashes($this->env->getExtension('website_extension')->nl2br($this->getAttribute($this->getContext($context, "dau_details"), "content"))), "html", null, true);
        echo "
        </div>
        <div class=\"sep\"></div>
        <div class=\"sep\"></div>
        <span class=\"price_span bold\">pret:</span> <span class=\"bold black font20\">";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "price"), "html", null, true);
        echo " &euro;</span>
        <div class=\"sep\"></div>
        <span itemscope itemtype=\"http://schema.org/PostalAddress\">
            <span class=\"price_span bold\">adresa:</span> <span itemprop=\"streetAddress\" class=\"bold black font20\">Chisinau (";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "raioane"), $this->getAttribute($this->getContext($context, "dau_details"), "raion"), array(), "array"), "html", null, true);
        echo "), ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "address"), "html", null, true);
        echo "</span>
        </span>
        <div class=\"sep\"></div>
        <span class=\"price_span bold\">contacte:</span> 
        <span class=\"bold black font20\">
            ";
        // line 54
        if ($this->getAttribute($this->getContext($context, "dau_details"), "fix")) {
            // line 55
            echo "                <span itemprop=\"telephone\">
                    <span style=\"font-size: 15px\">22</span> ";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "fix"), "html", null, true);
            echo "
                </span>
                &nbsp;
                <span class=\"price_span\">|</span>&nbsp;
            ";
        }
        // line 61
        echo "            <span itemprop=\"telephone\">
                ";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "mobil"), "html", null, true);
        echo "
            </span>
        </span>
    </div>
    <br />
    <br />
    ";
        // line 68
        if (($this->getAttribute($this->getContext($context, "dau_details"), "lat") && $this->getAttribute($this->getContext($context, "dau_details"), "llong"))) {
            // line 69
            echo "        <div itemprop=\"geo\">
            <span itemscope itemtype=\"http://schema.org/GeoCoordinates\">
                <meta itemprop=\"latitude\" content=\"";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "lat"), "html", null, true);
            echo "\" />
                <meta itemprop=\"longitude\" content=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "llong"), "html", null, true);
            echo "\" />
            </span>
        </div>
        <span class=\"price_span bold\" style=\"color:#276ED7;\">Harta</span>
        <br />
        <div id=\"map_canvas\" style=\"width:500px; height:500px;\"></div>
        <script type=\"text/javascript\" \tsrc=\"http://maps.google.com/maps/api/js?sensor=false\"></script>
        <script type=\"text/javascript\">
            //set up OpenStreetMap (OSM) tile options
            var osmMapTypeOptions = {
                    getTileUrl: function(coord, zoom) {
                            return \"http://tile.openstreetmap.org/\" +
                            zoom + \"/\" + coord.x + \"/\" + coord.y + \".png\";
                    },
                    tileSize: new google.maps.Size(256, 256),
                    isPng: true,
                    maxZoom: 19,
                    minZoom: 0,
                    name: \"Map\"
            };
\t\t\t 
            //create OSM Map Type as ImageMapType, pass options object
            var osmMapType = new google.maps.ImageMapType(osmMapTypeOptions); 
            var map;

            //setup map
            function initializeMap(){
                var latlng = new google.maps.LatLng('";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "lat"), "html", null, true);
            echo "','";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "llong"), "html", null, true);
            echo "');
                var mapOpts = {
                        zoom: 15,
                        center: latlng,
                        panControl: true,
                        scaleControl: true,
                        zoomControl: true,
                        zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.SMALL
                        },\t\t\t\t\t
                };

                map = new google.maps.Map(document.getElementById(\"map_canvas\"), mapOpts);

                //add OSM tiles as map type, first parameter must match 'name' attribute of osmMapTypeOptions
                map.mapTypes.set('OSM', osmMapType);

                //set default maptype to OSM tiles
                map.setMapTypeId('OSM');
                var marker = new google.maps.Marker({
                    position: latlng, 
                    map: map,
                    title:\"";
            // line 121
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "dau_details"), "address"), "html", null, true);
            echo "\"
                });
            }
        </script>
    ";
        }
        // line 126
        echo "    <script>
        \$(document).ready(function(){
            ";
        // line 128
        if (($this->getAttribute($this->getContext($context, "dau_details"), "lat") && $this->getAttribute($this->getContext($context, "dau_details"), "llong"))) {
            // line 129
            echo "                initializeMap();
            ";
        }
        // line 131
        echo "            \$('.gallery_photo').lightBox({
                imageLoading: '/images/lightbox-ico-loading.gif',
                imageBtnClose: '/images/lightbox-btn-close.gif',
                imageBtnPrev: '/images/lightbox-btn-prev.gif',
                imageBtnNext: '/images/lightbox-btn-next.gif'
           });
        })
    </script>
";
    }

    public function getTemplateName()
    {
        return "DauDauBundle:Dau:annDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
