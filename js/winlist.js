$(function () {

    var winners = {
        "ii": ["<b>Richa Agarwal</b>",
               "<b>Deblina Banarjee, Gaurav Tiwari</b>",
               "N/A"],
        "cz": ["<b>OFF-CAMPUS</b><br>Digvijay Kaushal",
               "<b>ON-CAMPUS</b><br>Shrey Sharma",
               "N/A"],
        "cw": ["<b>OFF-CAMPUS WINNER</b><br>Debjit Mandal",
               "<b>ON-CAMPUS WINNER</b><br>Sanu Kumar Gupta ",
               "N/A"],
        "jc": ["<b>JUDGE'S CHOICE</b><br>Ruchi Priya",
               "<b>POPULAR CHOICE</b><br>Subham Vyas",
              "N/A"],
        "nh": ["<b>Harsh Modi</b>",
               "<b>Gaurav Tiwari</b>",
               "N/A"],
        
        "cs": ["<b>SNS :: SMOKERS AND SHOOTERS</b><br>Soubham Bishorjit Singh, Kumar Ranjan, Pralay Kumar Das, Hridoy Dutta, Sunny Saurav",
               "<b>KD</b><br>Projan Das, Gurinder Preet Singh, Somenath Sikdar, Kongkan Kishor Deuri, Shahed Jamal",
               "N/A"],
        "poy": ["<b>Britya Ghosh</b>",
                "<b>Bhawna Chetri</b>",
                "<b>Vikesh Yadav, Sreejib</b>"],
        "gg": ["<b>Abhishek, Womesh</b>",
               "<b>Projan Das, Ankush Yadav</b>",
               "<b>Subham Verma, Uttam Omar</b>"],
        "trick": ["Shivam Das, Alok Sharma",
              "Mizan Rehman, Nisha Sharma",
              "Neha Chandra, Sweta"],
        "tm": ["<b>Sunita, Subodh</b>",
               "<b>Megha, Sitanshu</b>",
               "<b>Swati, Shruti</b>"],
        "bm": ["<b>Harsh Modi, Abhishek Thakur</b>",
               "N/A",
               "N/A"]
    };
    /*var winners = {
        "tc": ["Sk Jhohev, Stuti Agarwal",
               "Anupam Anand, Nishant Hadda",
               "N/A"],
        "jc": ["Melvin Mani",
               "Yet to be announced",
               "N/A"],
        
        "gg": ["N/A",
               "Anupam Anand, Nishant Hadda",
               "Sourabh Tiwari, Bappaditya Samanta"],
        "cz": ["Yet to be Announced",
               "Yet to be Announced",
               "Yet to be Announced"],
        "cw": ["<b>Team: 100Pi</b><br>Sk Jhohev, Souradeep Saha",
               "<b>Team: 100Pi</b><br>Sk Jhohev, Souradeep Saha",
               "<b>Team: 100Pi</b><br>Sk Jhohev, Souradeep Saha",],
        "ii": ["<b>N/A</b>",
               "<b>Shristi Parmanandka</b>",
               "<b>N/A</b>"]
    };*/
    var container2 = $('#container2');
    var container = $("#tsx4-winners");

    // WINNER LIST OPEN CODE
    $(".wincircle").click(function () {

        var event = $(this).attr('id');
        if (event in winners) {
            var currlist = winners[event];
            $('#one .name').html(currlist[0]);
            $('#two .name').html(currlist[1]);
            $('#three .name').html(currlist[2]);
        }
        else {
            $('#one .name').html("Yet to be announced");
            $('#two .name').html("Yet to be announced");
            $('#three .name').html("Yet to be announced");
        }

        /******GET VENDOR PREFIX******/
        var prefix = (function () {
            var styles = window.getComputedStyle(document.documentElement, ''),
                pre = (Array.prototype.slice
                    .call(styles)
                    .join('')
                    .match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
                )[1],
                dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
            return {
                dom: dom,
                lowercase: pre,
                css: '-' + pre + '-',
                js: pre[0].toUpperCase() + pre.substr(1)
            };
        })();

        var names = $('#container2 .name');
        names.css("opacity", 0);
        container2
            .css('visibility', 'visible')
            .velocity({
                opacity: 1
            }, 500, function () {
                names.addClass("show");
                /*names.each(function(i) {
                    $(this)
                    .delay(i*100)
                    .velocity({
                        scale: [1,3],
                        opacity: 1
                    },500);
                });*/
            });


        /*var blurElement = {a:0};//start the blur at 0 pixels

        TweenMax.to(blurElement, 0.5, {a:10, onUpdate:applyBlur});
        
        //here you pass the filter to the DOM element
        function applyBlur()
        {
            TweenMax.set(container,{webkitFilter:"blur(" + blurElement.a + "px)"}); 
        };
        // blurring container on winlist open*/

        //$("#container").toggleClass("blur");
    });


    // CLOSE LIST ON OUTSIDE CLICK
    var winlist = $('#winlist');
    winlist.click(function (e) {
        e.stopPropagation();
        e.preventDefault();
        return false;
    });
    container2.click(function () {
        var names = $('.name');
        names.removeClass("show");
        winlist.velocity({
            opacity: 0
        }, 250, function () {
            container2.velocity({
                opacity: 0
            }, 250, function () {
                container2.css('visibility', 'collapse');
                winlist.css('opacity', '1');
            });
        });

        /*
        var blurElement = {a:10};//start the blur at 0 pixels
        TweenMax.to(blurElement, 0.5, {a:0, onUpdate:applyBlur});
        
        //here you pass the filter to the DOM element
        function applyBlur()
        {
            TweenMax.set(container,{webkitFilter:"blur(" + blurElement.a + "px)"}); 
        };
        //$("#container").toggleClass("blur");*/
    });
});