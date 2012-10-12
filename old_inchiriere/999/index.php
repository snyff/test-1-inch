<?php session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
        <title></title>
        <style>
            body {
                font-size: 11px;
                font-family: verdana;
            }
            .mda {
                background-color:#FF8D7B;
            }
        </style>
        <script type="text/javascript">
            var _LASTADS = {
                ImagePath: "http://83.218.204.107/999.md/BoardImages/160x120/",
                Culture: 1049,
                RegionId: 0,
                CategoryId: null
            };
        </script>
        <script>
            var timeoutId = false;
            var oldTitle = '';
            var	lastAds = {
                categoryId: _LASTADS.CategoryId,
                culture: _LASTADS.Culture,
                regionId: _LASTADS.RegionId,
                imagePath: _LASTADS.ImagePath,
                firstTimeLoaded: false,
                blockNode: jQuery('#LastAds'),
                adTemplate: '<div class="it_left"><div class="it_right"><table cellpadding="0" cellspacing="0" border="0" width="100%" style="table-layout: fixed;"><tr><td width="16" class="ad-to-basket"><a href="#" alt="добавить в корзину" title="добавить в корзину" class="buy2">&nbsp;</a></td><td width="28"><div class="photo" onmouseout=\'javascript:hidePhoto("preview_div")\'></div></td><td valign="top"><div class="title" style="margin: 0;"><a href="#" class="tit" style="position: static !important;" title="" ></a><div class="sh"></div></div></td><td class="categ"><a href="#" class="category-title"></a></td><td width="112"><div class="date"></div></td></tr></table></div></div>',
            };

            lastAds.blockNode.css({
                'position':'relative',
                'z-index':'1'
            }).html('<div class="short_view"><div style="background:url(/images/ico/l33_c.gif) left -1px repeat-x;"><div style="background:url(/images/ico/l33_lp.gif) left -1px no-repeat;"><div id="boardItemList" style="background:url(/images/ico/l33_rp.gif) right -1px no-repeat;"><div class="item" style="background: none;"><div class="it_left" style="background: none;"><div class="it_right" style="background: none;"><table cellpadding="0" cellspacing="0" border="0" width="100%" style="table-layout: fixed; color: #6B7180 !important; margin-top: 6px;font-size:13px !important;"><tr><td width="16">&nbsp;</td><td width="28">&nbsp;</td><td valign="top">заголовок</td><td class="categ" style="color: #6B7180 !important;">раздел</td><td width="105" align="right" style="padding-right: 7px;">дата</td></tr></table></div></div></div><div id="lastAdsTable"></table></div></div></div></div>');

            lastAds.tableNode = lastAds.blockNode.find('#lastAdsTable');
            lastAds.tableNode.css({
                'position':'relative'
            }).hide();

            lastAds.insertAd = function(item){
                var itemNode = jQuery("<div/>")
                .addClass('item')
                .html(lastAds.adTemplate);
                itemNode
                .attr({'addId':item.AdId});
                itemNode
                .find('.ad-to-basket a')
                .click(function(){
                    //jQuery(this).toggleClass('buy').toggleClass('buy2');
                    basket.toggleAndRefresh(item.AdId, this);
                    return false;
                });
                if(item.Image){
                    itemNode.find('.photo').show()
                    .mouseover(function(){
                        showPhoto(lastAds.imagePath + item.Image,"preview_div")
                    });
                }else{
                    itemNode.find('.photo').hide();
                }
                itemNode
                .find('a.tit')
                .text(item.Title)
                .attr({
                    'href':"/Board/Message.aspx?MsgID=" + item.AdId,
                    'title':item.Body
                });
                itemNode
                .find('a.category-title')
                .text(item.SubCategory)
                .attr({
                    'href':"/Board/All.aspx?catId=" + item.SubCategoryId,
                    'title':item.SubCategory
                });
                itemNode
                .find('.date')
                .text(item.DatePosted);

                itemNode
                .prependTo(lastAds.tableNode)
                .hide()
                .slideDown(300);

                //                basket.refresh(item.AdId,itemNode.find('.ad-to-basket a').get(0));

                return itemNode;
            }
            
            lastAds.loadLast = function(){
                clearTimeout(lastAds.loadTimeout)
                var data = {
                    rand: (new Date()).getTime(),
                };
                if(lastAds.lastId){ data.lastId = lastAds.lastId; }
                if(lastAds.categoryId){ data.categoryId = lastAds.categoryId; }
                if(lastAds.culture){ data.culture = lastAds.culture; }
                if(lastAds.regionId){ data.regionId = lastAds.regionId; }
                jQuery.ajax({
                    type: "GET",
                    url: "getLast.php",
                    data: data,
                    success: function(data){
                        eval("data="+data);
                        if(data.length>0){
                            jQuery.each(data.reverse(),function(i,item){
                                if(i==data.length-1){ lastAds.lastId=item.AdId; }
                                var node = lastAds.tableNode.find('.item[addId="' + item.AdId + '"]');
                                if(item.SubCategoryId == 1404) {
                                    var regex = /продаётся/gi;
                                    var regex1 = /продаю/gi;
                                    var regex2 = /ПОСУТОЧНО/gi;
                                    var regex3 = /LUX/gi;
                                    var regex4 = /vip/gi;
                                    var regex5 = /PE ORE/gi;
                                    var regex6 = /PE ZI/gi;
                                    var regex7 = /vinzare/gi;
                                    var regex8 = /Элитная/gi;
                                    var regex9 = /Продается/gi;
                                    var regex10 = /Шикарная/gi;
                                    var regex11 = /Se vinde/gi;
                                    var regex12 = /vind/gi;
                                    var regex13 = /СНИМУ/gi;
                                    var regex14 = /продам/gi;
                                    var regex15 = /МЕНЯЮ/gi;
                                    var regex16 = /СЕРЕДИНА/gi;
                                    var regex17 = /ВЫНД/gi;
                                    var regex18 = /КУПЛЮ/gi;

                                    if(!regex.exec(item.Body) && !regex.exec(item.Title)
                                        && !regex1.exec(item.Body) && !regex1.exec(item.Title)
                                        && !regex2.exec(item.Body) && !regex2.exec(item.Title)
                                        && !regex3.exec(item.Body) && !regex3.exec(item.Title)
                                        && !regex4.exec(item.Body) && !regex4.exec(item.Title)
                                        && !regex5.exec(item.Body) && !regex5.exec(item.Title)
                                        && !regex6.exec(item.Body) && !regex6.exec(item.Title)
                                        && !regex7.exec(item.Body) && !regex7.exec(item.Title)
                                        && !regex8.exec(item.Body) && !regex8.exec(item.Title)
                                        && !regex9.exec(item.Body) && !regex9.exec(item.Title)
                                        && !regex10.exec(item.Body) && !regex10.exec(item.Title)
                                        && !regex11.exec(item.Body) && !regex11.exec(item.Title)
                                        && !regex12.exec(item.Body) && !regex12.exec(item.Title)
                                        && !regex13.exec(item.Body) && !regex13.exec(item.Title)
                                        && !regex14.exec(item.Body) && !regex14.exec(item.Title)
                                        && !regex15.exec(item.Body) && !regex15.exec(item.Title)
                                        && !regex16.exec(item.Body) && !regex16.exec(item.Title)
                                        && !regex17.exec(item.Body) && !regex17.exec(item.Title)
                                        && !regex18.exec(item.Body) && !regex18.exec(item.Title)
                                ) {
                                        $('#last_ads').prepend('<div class="mda"><div style="float:right;font-style:italic;color:red;">'+item.DatePosted+'</div>'+item.Title+'<br />'+item.Body+'<br /><a href="http://999.md/Board/Message.aspx?MsgID='+item.AdId+'" target="_blank">Link</a></div><hr />');
                                        oldTitle = document.title;
                                        var msg = "New!";
                                        clearInterval(timeoutId);
                                        timeoutId = setInterval(function() {
                                            document.title = document.title == msg ? ' ' : msg;
                                        }, 1000);
                                    }
                                }
                                window.onmousemove = function() {
                                    clearInterval(timeoutId);
                                    document.title = '';
                                    $('.mda').removeClass('mda');
                                    window.onmousemove = null;
                                };
                                //                                $('#last_ads_all').prepend('<div><div style="float:right;font-style:italic;color:red;">'+item.DatePosted+'</div>'+item.Title+'<br />'+item.Body+'<br /><a href="http://999.md/Board/Message.aspx?MsgID='+item.AdId+'" target="_blank">Link</a></div><hr />');
                            });
                        }
                    },
                    complete: function(){
                        lastAds.loadTimeout = setTimeout(lastAds.loadLast,2000);
                    }
                });
            }

            lastAds.loadLast();
            function getMakler() {
                jQuery.ajax({
                    type: "GET",
                    url: "makler/getLast.php",
                    success: function(return_data){
                        var data = JSON.parse(return_data);
                        var i;
                        if(data.length > 0){
                            for(i=0;i<data.annonce.length;i++) {
                                $('#last_ads').prepend('<div class="mda"><div style="float:right;font-style:italic;color:green;font-weight:bold;">MAKLER</div>'+data.annonce[i]+'<br /></div><hr />');
                                oldTitle = document.title;
                                var msg = "New!";
                                clearInterval(timeoutId);
                                timeoutId = setInterval(function() {
                                    document.title = document.title == msg ? ' ' : msg;
                                }, 1000);
                                window.onmousemove = function() {
                                    clearInterval(timeoutId);
                                    document.title = '';
                                    $('.mda').removeClass('mda');
                                    window.onmousemove = null;
                                };
                            }
                        }
                    }
                });
                setTimeout('getMakler()', 10000);
            }
            getMakler();
            setTimeout('getMakler()', 1000);
        </script>
    </head>
    <body>
        <div id="last_ads" style="border:2px solid;padding:5px;background-color:#FFF9B3;overflow: auto; "></div>
        <br />
        <div id="last_ads_all" style="height:556px;"></div>

    </body>
</html>
