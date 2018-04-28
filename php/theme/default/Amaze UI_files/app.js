// 初始化
$(function() {
    var dataType = $('body').attr('data-type');
    for (key in pageData) {
        if (key == dataType) {
            if (key != 'preview') {
                nav();
                pageData[key]();
            } else {
                pageData[key]();
            }
        }
    }

    $('.am-topbar-btn').on('click', function() {
        $('.am-collapse').toggle()
    })
})


// 头部导航
function nav() {
    var navHtml = '<header class="am-topbar am-topbar-fixed-top"><div class="am-container"><h1 class="am-topbar-brand app-logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1><button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only" data-am-collapse="{target:#collapse-head}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button><div class="am-collapse am-topbar-collapse" id="collapse-head"><ul class="am-nav am-nav-pills am-topbar-nav"><li  data-type="index"  class="am-active"><a href="index.html">首页</a></li><li  data-type="developer" ><a href="developer.html">作者中心</a></li><li><a href="http://ask.amazeui.org/">社区</a></li><li><a href="http://amazeui.org/">Amaze UI</a></li></ul></div></div></header>';
    $('body').prepend(navHtml).find('li').each(function() {
        if ($(this).attr('data-type') == $('body').attr('data-type')) {
            $(this).addClass('').siblings().removeClass('')
        } else {
            $(this).removeClass('');
        }
    });

}

// 数据请求
var templateAjax = $.getJSON('../../data/templatejson.json', function() {}),
    userAjax = $.getJSON('../../data/user.json', function() {}),
    pageDataNum = 3,
    pageDataGet = 3,
    page = 0,
    pageTotal = 0;


// 页面数据
var pageData = {
    // ===============================================
    // 首页
    // ===============================================
    'index': function indexData() {

        // 首页数据
        TemplateList()

        // 首页筛选数据 
        $.getJSON('../../data/templatejson.json', function(data) {


            var colorData = [];
            var colorHtml = '';
            for (var i = 0; i < data.data.list.length; i++) {
                colorData.push(data.data.list[i].color)
            };

            colorData = unique(colorData)
            console.log(colorData)
            for (var i = 0; i < colorData.length; i++) {
                colorHtml += '<li data-color="' + colorData[i] + '" style="background:' + colorData[i] + '"></li>'
            }

            $('.app-main-bar-color ul').html(colorHtml).find('li').on('click', function() {
                var _this = $(this)
                var rel = $('.template-block');
                rel.each(function() {

                    if ($(this).attr('data-color') == _this.attr('data-color')) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }


                })
            });

            var codeData = {
                "全部": {
                    "num": data.data.list.length,
                    "code": "全部"
                },
            }

            var codeTempArrt = [];
            var codeSelectHtml = '';

            for (var i = 0; i < data.data.list.length; i++) {
                codeTempArrt.push(data.data.list[i].code)
            };


            unique(codeTempArrt);

            codeTempArrt = unique(codeTempArrt)
            console.log(codeTempArrt);
            var codeNum = 0;
            for (var key in codeData) {
                for (var i = 0; i < codeTempArrt.length; i++) {
                    codeNum = 0
                    for (var j = 0; j < data.data.list.length; j++) {
                        if (codeTempArrt[i] == data.data.list[j].code) {
                            ++codeNum;
                        }
                    }
                    key = codeTempArrt[i];
                    codeData[key] = {
                        "num": codeNum,
                        "code": codeTempArrt[i]
                    }
                }

            }

            console.log(codeData);
            for (var key in codeData) {
                codeSelectHtml += '<dl data-code="' + codeData[key].code + '"><dt>' + key + '</dt><dd>' + codeData[key].num + '</dd></dl>';
            }

            $('.app-main-bar-code').html(codeSelectHtml).find('dl').on('click', function() {
                var _this = $(this)
                var rel = $('.template-block');
                $('.app-main-bar-class').find('dt').removeClass('active')
                _this.find('dt').addClass('active').parent().siblings().find('dt').removeClass('active');
                rel.each(function() {
                    if (_this.attr('data-code') == '全部') {
                        $(this).show();
                    } else {
                        if ($(this).attr('data-code') == _this.attr('data-code')) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }

                })

            });

            var listData = {
                "全部": {
                    "num": data.data.list.length,
                    "type": "全部"
                },
            }


            var tempArrt = [];
            var typeSelectHtml = '';

            for (var i = 0; i < data.data.list.length; i++) {
                tempArrt.push(data.data.list[i].type)
            };


            unique(tempArrt);


            var num = 0;
            for (var key in listData) {
                for (var i = 0; i < tempArrt.length; i++) {
                    num = 0
                    for (var j = 0; j < data.data.list.length; j++) {
                        if (tempArrt[i] == data.data.list[j].type) {
                            ++num;
                        }
                    }
                    key = tempArrt[i];
                    listData[key] = {
                        "num": num,
                        "type": tempArrt[i]
                    }
                }


            }
            for (var key in listData) {
                typeSelectHtml += '<dl data-type="' + listData[key].type + '"><dt>' + key + '</dt><dd>' + listData[key].num + '</dd></dl>';
            }

            $('.app-main-bar-class').html(typeSelectHtml).find('dl').on('click', function() {
                var _this = $(this)
                var rel = $('.template-block');
                $('.app-main-bar-code').find('dt').removeClass('active')
                _this.find('dt').addClass('active').parent().siblings().find('dt').removeClass('active');
                rel.each(function() {
                    if (_this.attr('data-type') == '全部') {
                        $(this).show();
                    } else {
                        if ($(this).attr('data-type') == _this.attr('data-type')) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }

                })


            });




        })
    },
    // ===============================================
    // 作者中心
    // ===============================================
    'developer': function developerData() {
        // 首页筛选数据 
        UserList()

        var listData = {
            "不限": "all",
        }
        var newAttr = [];
        var newAttrKey = [];
        var newSelectHtml = '';
        $.getJSON('../../data/templatejson.json', function(data) {

            for (var i = 0; i < data.data.list.length; i++) {
                newAttr.push(data.data.list[i].type);
            }
            newAttr = unique(newAttr);
            // console.log(newAttr);


            for (var key in listData) {
                for (var i = 0; i < newAttr.length; i++) {
                    switch (newAttr[i]) {
                        case '电商购物':
                            newAttrKey[i] = 'shop'
                            break;
                        case '个人博客':
                            newAttrKey[i] = 'blog'
                            break;
                        case '企业门户':
                            newAttrKey[i] = 'company'
                            break;
                        case '社区':
                            newAttrKey[i] = 'bbs'
                            break;
                        case '新闻资讯':
                            newAttrKey[i] = 'news'
                            break;
                        case '后台管理':
                            newAttrKey[i] = 'admin'
                            break;
                        case '响应式':
                            newAttrKey[i] = 'auto'
                            break;
                        case 'OA':
                            newAttrKey[i] = 'oa'
                            break;
                    }
                    key = newAttr[i];
                    listData[key] = newAttrKey[i];
                }


            }

            for (var key in listData) {
                newSelectHtml += '<span data-type="' + listData[key] + '">' + key + '</span>'
            }
            console.log(newSelectHtml);
            $('.select-good').html(newSelectHtml).find('span').on('click', function() {
                if ($(this).attr('data-type') == 'all') {
                    $('.app-works').show();
                } else {
                    $('.data-none').hide()
                    $('.app-works').hide();
                    var getTag = $(this).attr('data-type')
                    if ($('.' + getTag).length > 0) {
                        $('.' + getTag).show()
                    } else {
                        $('.data-none').show();
                    }

                }

            });


        })






    },
    // ===============================================
    // 作者中心
    // ===============================================
    'content': function contentData() {
        var getUrl = window.location.search.substr(1);

        $('.github-star').on('click', function() {
            window.open("https://github.com/amazeui/amazeui/stargazers");
            $('.am-modal').modal('close');
        })
        $('.github-none').on('click', function() {
                $('.am-modal').modal('close');
            })
            // $('.contents-info-button .code').
            //     on('click', function () {
            //         $('#my-confirm').modal({
            //             relatedTarget: this,
            //             onConfirm: function (options) {
            //                
            //             },
            //             closeOnConfirm: false,
            //             onCancel: function () {
            //                 $('#my-confirm').modal('close');
            //             }
            //         });
            // });
        $.when(templateAjax, userAjax).then(function(templateData, userData) {

            var template = templateData[0].data.list,
                user = userData[0].data.list,
                amazeui = userData[0].data.amazeui;


            var moreHtml = '';
            var saveUser = 0;

            for (var i = 0; i < template.length; i++) {
                // console.log(template[i].id);



                if (getUrl == template[i].id) {

                    for (var l = 0; l < user.length; l++) {

                        if (template[i].userId == user[l].id) {

                            for (var k = 0; k < template.length; k++) {
                                if (user[l].id == template[k].userId) {
                                    console.log(template[k]);
                                    moreHtml += '<li data-id="' + template[k].id + '"><img src=" ' + template[k].pageCover + ' " ></li>';
                                }
                            }
                            console.log('ID是', user[l].id);
                            $('.contents-more-button').attr('data-id', user[l].id).on('click', function() {
                                    window.location.href = 'user.html?' + $(this).attr('data-id');
                                })
                                // 头像
                            $('.data-content-user-ico').attr({ 'src': user[l].ico, 'data-id': user[l].id })

                            $('.data-content-user-ico').on('click', function() {
                                    window.location.href = 'user.html?' + $(this).attr('data-id');
                                })
                                // 名字
                            $('.contents-info-user-name').html(user[l].name);
                            $('.contents-info-user-name').attr('data-id', user[l].id)
                            $('.contents-info-user-name').on('click', function() {
                                    window.location.href = 'user.html?' + $(this).attr('data-id');
                                })
                                // 是否认证开发者
                            user[l].isAmazeUi ? $('.contents-info-title-ico').show() : $('.contents-info-title-ico').hide();
                            // 相关名字
                            $('.app-content-correlation-name').html(user[l].name);



                        }


                    }
                    // 封面
                    var coverHtml = '';
                    for (var p = 0; p < template[i].cover.length; p++) {
                        coverHtml += '<img src=" ' + template[i].cover[p] + ' ">'
                    }

                    (function(i) {
                        $('.contents-info-right-content').html(coverHtml).find('img').on('click', function() {
                            window.location.href = 'preview.html?' + template[i].id
                        })
                    })(i)

                    // 类型
                    $('.contents-info-user-type').html(template[i].type);
                    //  内容标题
                    $('.contents-info-title-font').prepend(template[i].title);
                    //  描述内容
                    $('.contents-info-works-info-int').html(template[i].intro);
                    //  添加时间
                    $('.contents-info-user-time').html(template[i].addTime);
                    // 模板类型
                    $('.contents-info-works-info-code').html('<span><i class="' + template[i].code + '">' + template[i].code + '</i></span>');
                    // 下载
                    $('.code').attr('href', template[i].download);
                    // 预览
                    if (template[i].page.length >= 1) {
                        $('.preview').attr('href', 'preview.html?' + template[i].id);
                    } else {
                        $('.preview').hide();
                    }
                    // 页数
                    $('.contents-info-works-info-signal-num').html(template[i].pageNum);
                    // 颜色
                    $('.contents-info-works-data-color').css('background', template[i].color)



                }




            }

            $('.contents-more').html(moreHtml).find('li').on('click', function() {
                window.location.href = 'content.html?' + $(this).attr('data-id');
            });

        })


    },
    // ===============================================
    // 作者中心
    // ===============================================
    'user': function userData() {

        var getUrl = window.location.search.substr(1);

        $.when(templateAjax, userAjax).then(function(templateData, userData) {

            var template = templateData[0].data.list,
                user = userData[0].data.list,
                amazeui = userData[0].data.amazeui;
            var good = '';
            var templateHtml = '';
            for (var j = 0; j < template.length; j++) {
                if (template[j].userId == getUrl) {
                    templateHtml += '<div data-id="' + template[j].id + '" class="template-block"><div class="template-block-img"><img src="' + template[j].pageCover + '"></div><div class="template-block-info"><dl><dt>' + template[j].type + '</dt><dd><i class="' + template[j].code + '"></i></dd></dl></div></div>';
                }
            }
            $('.app-user-list').html(templateHtml).find('.template-block').on('click', function() {
                window.location.href = 'content.html?' + $(this).attr('data-id');
            })
            for (var i = 0; i < user.length; i++) {
                if (getUrl == user[i].id) {
                    // 名字
                    $('.data-user-name').html(user[i].name);
                    // 头像
                    $('.data-user-ico').attr('src', user[i].ico)
                        // 是否开发者
                    if (user[i].isAmazeUi) {
                        $('.data-user-isamazeui').css('opacity', '100');
                    }

                    // 城市
                    $('.data-user-city').html(user[i].city);
                    // 擅长领域
                    for (var l = 0; l < user[i].good.length; l++) {
                        switch (user[i].good[l]) {
                            case 'shop':
                                user[i].good[l] = '电商购物'
                                break;
                            case 'blog':
                                user[i].good[l] = '个人博客'
                                break;
                            case 'company':
                                user[i].good[l] = '企业门户'
                                break;
                            case 'news':
                                user[i].good[l] = '新闻资讯'
                                break;
                            case 'bbs':
                                user[i].good[l] = '社区'
                                break;
                            case 'admin':
                                user[i].good[l] = '后台管理'
                                break;
                            case 'auto':
                                user[i].good[l] = '响应式'
                                break;
                            case 'oa':
                                user[i].good[l] = 'OA'
                                break;
                        }

                        good += '  ' + user[i].good[l];
                    }
                    $('.data-user-good').html(good);




                }

            }
        })
    },
    // ===============================================
    // 作者中心
    // ===============================================
    'preview': function previewData() {
        $('.am-with-topbar-fixed-top').css('padding', '0')
        $('body').css('padding', '0');
        var getUrl = window.location.search.substr(1);

        $.when(templateAjax, userAjax).then(function(templateData, userData) {

            var template = templateData[0].data.list,
                user = userData[0].data.list,
                amazeui = userData[0].data.amazeui;


            // 打开页面列表
            $('.open-preview-list').on('click', function() {
                $(this).find('i').toggleClass('active');
                $('.preview-nav-list').toggleClass('active');
            })
            var htmlList = '';
            for (var i = 0; i < template.length; i++) {
                if (getUrl == template[i].id) {
                    for (var l = 0; l < template[i].page.length; l++) {
                        $('.preview-view-iframe').attr('src', template[i].page[0][1]);
                        htmlList += '<span data-src="' + template[i].page[l][1] + '"><i class="iconfont">&#xe619;</i> ' + template[i].page[l][0] + '</span>';

                    }


                    // 判断类型
                    switch (template[i].pageType) {
                        case 'wap':
                            $('.preview-list-pc , .preview-list-wap').hide();
                            $('.preview-pc-block').hide();
                            $('.preview-phone-block').show();
                            break;
                        case 'rwd':
                            // $('.preview-list-pc , .preview-list-wap').hide();
                            $('.preview-list-pc').find('i').addClass('active');
                            $('.preview-pc-block').show();
                            autoSize()

                            $(window).resize(function() {
                                autoSize()
                            });


                            break;
                        case 'pc':
                            $('.preview-list-pc , .preview-list-wap').hide();
                            $('.preview-pc-block').show();
                            autoSize()

                            $(window).resize(function() {
                                autoSize()
                            });
                            break;
                        default:
                            break;
                    }
                }
            }

            function autoSize() {
                if ($('body').width() < 700) {
                    $('.preview').css({
                        "max-width": "100%"
                    });
                    $('.preview-nav').hide();
                    $('.preview-pc-view').css('height', $(window).height())
                } else {
                    $('.preview').css({
                        "max-width": "100%",
                        "padding-right": "70px"
                    });
                    $('.preview-pc-view').css('height', $(window).height() - 33)
                }

            }
            $('.preview-nav-list-block').html(htmlList).find('span').on('click', function() {
                $(this).addClass('active').siblings().removeClass('active');
                $('.preview-view-iframe').attr('src', $(this).attr('data-src'))
            });
            $('.preview-nav-list-block span:nth-child(1)').addClass('active');
            $('.preview-list-pc').on('click', function() {
                $('.preview-phone-block').hide();
                $('.preview-pc-block').show();
                $(this).find('i').addClass('active');
                $('.preview-list-wap').find('i').removeClass('active')
            })
            $('.preview-list-wap').on('click', function() {
                    $('.preview-phone-block').show();
                    $('.preview-pc-block').hide();
                    $(this).find('i').addClass('active');
                    $('.preview-list-pc').find('i').removeClass('active')
                })
                // 返回上一页
            $('.back-top').on('click', function() {
                window.location.href = 'content.html?' + getUrl;
            });


        })
    },
    // ===============================================
    // 首页
    // ===============================================
    'info': function infoData() {
        nav();
    }
}


function UserList(ObjData) {
    // 首页列表数据
    var templateHtml = '',
        userHtml = '',
        tagHtml = '';

    // 排队请求
    $.when(templateAjax, userAjax).then(function(templateData, userData) {

        var template = templateData[0].data.list,
            user = userData[0].data.list,
            amazeui = userData[0].data.amazeui;


        var isAmazeUIHtml = '';
        for (var i = 0; i < amazeui.length; i++) {
            console.log(amazeui[i]);
            for (var l = 0; l < user.length; l++) {
                if (amazeui[i] == user[l].id) {
                    isAmazeUIHtml += '<li data-id="' + user[l].id + '"><img src="' + user[l].ico + '"><span>' + user[l].name + '</span></li>';
                }
            }


        }
        // pageData
        // pageNum(pageDataNum, Math.ceil(template.length/pageDataNum))
        // console.log(page,'|||',pageDataNum)

        var newStar = '';

        for (var i = 0; i < user.length; i++) {
            tagHtml = '';
            var good = '';
            var goodType = '';
            var userTempHtml = '';
            var isAmazeUIState = '0';
            var newNum = 0;


            // 新星榜
            if (i <= 4) {
                newStar += '<dl  data-id="' + user[i].id + '" class="app-works-right-new-user"><dt><img src="' + user[i].ico + '" ></dt><dd><span class="app-works-right-new-user-name">' + user[i].name + '</span><span class="app-works-right-new-user-time">' + user[i].addTime + '</span></dd></dl>';
            }







            for (var g = 0; g < user[i].good.length; g++) {
                goodType += ' ' + user[i].good[g];
                switch (user[i].good[g]) {
                    case 'shop':
                        user[i].good[g] = '电商购物'
                        break;
                    case 'blog':
                        user[i].good[g] = '个人博客'
                        break;
                    case 'company':
                        user[i].good[g] = '企业门户'
                        break;
                    case 'news':
                        user[i].good[g] = '新闻资讯'
                        break;
                    case 'bbs':
                        user[i].good[g] = '社区'
                        break;
                    case 'admin':
                        user[i].good[g] = '后台模板'
                        break;
                    case 'auto':
                        user[i].good[g] = '响应式'
                        break;
                    case 'oa':
                        user[i].good[g] = 'OA'
                        break;
                }
                good += ' ' + user[i].good[g];
            }
            if (user[i].isAmazeUi) {
                isAmazeUIState = '100';
            }
            // 用户信息
            var sliderHtml = '';
            for (var j = 0; j < template.length; j++) {
                if (user[i].id == template[j].userId) {

                    sliderHtml += '<li data-id="' + template[j].id + '"><img src="' + template[j].pageCover + '"></li>'
                }
            }
            console.log();
            userTempHtml = '<div class="app-works-images"><div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider="{}"><ul class="am-slides">' + sliderHtml + '</ul></div></div>';
            // };
            // 轮播
            // for (var m = 0; m < array.length; m++) {

            //     var slider = ' <div class="app-works-images"><div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider=' + {} + '><ul class="am-slides"></ul></div></div>'
            // }

            // 主要信息
            templateHtml += ' <div class="app-works' + goodType + ' all"><div class="app-works-user"><div data-id="' + user[i].id + '" class="app-works-user-ico"><img src="' + user[i].ico + '"></div><div class="app-works-user-info"><div data-id="' + user[i].id + '" class="app-works-user-name">' + user[i].name + '<span style="opacity:' + isAmazeUIState + '" class="approve"></span></div></div><div class="app-works-user-city"><i class="iconfont"></i> ' + user[i].city + '</div><div class="app-works-user-type"><div class="app-works-user-type"><span class="app-works-user-type-font">擅长领域：</span><span>' + good + '</span></div></div></div>' + userTempHtml + '<a class="app-works-more" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=55449477&site=qq&menu=yes">预约开发者</a></div>';
        };

        templateHtml += '<div class="data-none">暂无数据</div>'
        $('.app-works-list-1000').html(templateHtml).find('.app-works-user-ico , .app-works-user-name').on('click', function() {
            window.location.href = 'user.html?' + $(this).attr('data-id');
        });
        $('.app-recommend-user-list').html(isAmazeUIHtml).find('li').on('click', function() {
            window.location.href = 'user.html?' + $(this).attr('data-id');
        });
        $('.app-works-right-new').append(newStar).find('dl').on('click', function() {
            window.location.href = 'user.html?' + $(this).attr('data-id');
        });
        $('.am-slider').flexslider();
        $('.am-slides').find('li').on('click', function() {
            window.location.href = 'content.html?' + $(this).attr('data-id');
        })

    })
}
// 数据请求
function TemplateList(ObjData) {
    // 首页列表数据
    var templateHtml = '',
        userHtml = '',
        tagHtml = '';

    // 排队请求
    $.when(templateAjax, userAjax).then(function(templateData, userData) {

        var template = templateData[0].data.list,
            user = userData[0].data.list;

        // pageData
        // pageNum(pageDataNum, Math.ceil(template.length/pageDataNum))
        // console.log(page,'|||',pageDataNum)
        for (var i = 0; i < template.length; i++) {
            tagHtml = '';
            // 用户信息
            for (var j = 0; j < user.length; j++) {
                if (user[j].id == template[i].userId) {
                    userHtml = '<div class="template-block-user"><dl><dt data-id="' + user[j].id + '"><img src="' + user[j].ico + '"></dt><dd data-id="' + user[j].id + '">' + user[j].name + '</dd></dl></div>';
                }
            };

            // TAG信息
            // for (var l = 0; l < template[i].length; l++) {
            //     tagHtml += '<i class="' + template[i].code[l] + '"></i>';
            // };

            // 主要信息
            templateHtml += '<div data-type="' + template[i].type + '" data-color="' + template[i].color + '" data-code="' + template[i].code + '" class="template-block"><div data-id="' + template[i].id + '" class="template-block-img"><img src="' + template[i].pageCover + '"></div><div class="template-block-info"><dl><dt>' + template[i].type + '</dt><dd><i class="' + template[i].code + '"></i></dd></dl></div>' + userHtml + '</div>';
        };
        $('.app-index-template-list').html(templateHtml).find('.template-block-img').on('click', function() {
            window.location.href = 'content.html?' + $(this).attr('data-id');
        });
        $('.template-block-user dt , .template-block-user dd').on('click', function() {
            window.location.href = 'user.html?' + $(this).attr('data-id');
        })

    })
}

// page 
// function pageNum(pageNum,pageTotalNum){
//     var pageHtml = '';
//     for (var i = 0; i < pageTotalNum; i++) {
//         pageHtml += '<li data-page="'+ Number(i + 1) +'">'+ Number(i + 1) +'</li>';
//     }
//     $('.app-page ul').html(pageHtml).find('li').on('click',function(){
//         var gatPage = Number($(this).attr('data-page') - 1)
//         page = gatPage * pageNum;
//         TemplateList()
//     });
// }
function unique(arr) {
    var ret = []

    for (var i = 0; i < arr.length; i++) {
        var item = arr[i]
        if (ret.indexOf(item) === -1) {
            ret.push(item)
        }
    }
    return ret
}