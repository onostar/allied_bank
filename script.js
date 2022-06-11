window.onscroll = function(){changeHeader(), displayTotopButton(), showServices(), displayAbout(), displayPartners(), displaytestimony(), displayCore() /*showRecentWork(), displayCallToAction() */};

/* change header */
function changeHeader(){
    if(document.body.scrollTop > 35 || document.documentElement.scrollTop > 35){
        document.getElementById('mainHeader').className = 'new_header';
        /* document.getElementById('h1').style.width = '15%'; */
        /* document.querySelector('.logo').className = 'new-logo'; */
    }
    else{
        document.getElementById('mainHeader').className = 'main_header';
        /* document.getElementById('h1').style.width = '25%'; */
        /* document.querySelector('.logo').className = 'logo'; */
    }
}

/* show services */
function showServices(){
    if(document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000){
        document.getElementById('why_choose').style.display= 'flex';
        
    }
    else{
        document.getElementById('why_choose').style.display= 'none';
        
    }
}
/* display core services */
function displayCore(){
    if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200){
        document.getElementById('core_service').style.display= 'block';
        
    }
    else{
        document.getElementById('core_service').style.display= 'none';
        
    }
}
/* show request form */
function requestForm(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        document.getElementById('reqMaster').style.display= 'block';
        
    }
    else{
        document.getElementById('reqMaster').style.display= 'none';
        
    }
}

/* loader */
/* let loader = document.querySelector('.loading');
let main = document.querySelector('.main');

function init(){
    setTimeout(function() {
        loader.style.opacity = 0;
        loader.style.display = 'none';
        
        main.style.display = 'block';
        setTimeout(()=>{
        main.style.opacity = 1;
        }, 50);
    }, 2500);
}
init(); */

//display to top button after few seconds
function displayTotopButton(){
    if(document.body.scrollTop > 70 || document.documentElement.scrollTop > 70){
        document.querySelector('.toTop').style.display = 'block';
    }
    else{
        document.querySelector('.toTop').style.display = 'none';
    }
}

/* display mobile navigation */
function displayMenu(){
    let myMenu = document.getElementById('navigation');
    if(myMenu.style.display === "block"){
        myMenu.style.display = "none";
        
    }
    else{
        myMenu.style.display = "block";
        
    }
}

/* display request form */
$(document).ready(function(){
    $(".showRequest").click(function(){
        $("#request_form").show();
    })
})
/* close request form */
$(document).ready(function(){
    $("#close_request").click(function(){
        $("#request_form").hide();
    })
})

/* display purpose */
function displayAbout(){
    if(document.body.scrollTop > 700 || document.documentElement.scrollTop > 700){
        document.getElementById('about_us').style.display = 'flex';
    }else{
        document.getElementById('about_us').style.display = 'none';
    }
}
/* display call to action */
function displayPartners(){
    if(document.body.scrollTop > 1900 || document.documentElement.scrollTop > 1900){
        document.querySelector('.partners').style.display = 'flex';
    }else{
        document.querySelector('.partners').style.display = 'none';
    }
}
/* display testimony */
function displaytestimony(){
    if(document.body.scrollTop > 2500 || document.documentElement.scrollTop > 2500){
        document.getElementById('testimonies').style.display = 'block';
    }else{
        document.getElementById('testimonies').style.display = 'none';
    }
}

/* new way to toggle different menu on the page */
function showPage(page){
    //hide all pages when one displays
    document.getElementById("dashboard").style.display = "none";
    $("#nav2Menu").hide();

    document.querySelectorAll('.displays').forEach(div =>{
        div.style.display = "none";
    });
    document.querySelectorAll('.management').forEach(div =>{
        div.style.display = "none";
    });
    document.querySelector(`#${page}`).style.display = "block";
}
//make links clickable to get to its respective page
document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll(".page_navs").forEach(navs => {
        navs.onclick = function(){
            showPage(this.dataset.page);
            $("#paid_receipt").hide();
            document.getElementById("profit").style.display = "none";
            // $(this.dataset.page).load(`admin.php ${this.dataset.page}`);
            
        }
    })
})

// display login on mobile
$(document).ready(function(){
    $("#mobile_log #loginDiv").click(function(){
        $("#mobile_log .login_option").toggle();
        // console.log("Working");
    }); 
});

$(document).ready(function(){
    $(".menu_icon").click(function(){
        $(".mobile_menu").toggle();
    });
    $("#contents").click(function(){
        $(".mobile_menu").hide();
        
    })
})

//display login on desktop page
$(document).ready(function(){
    $("#loginDiv").click(function(){
        $(".login_option").toggle();
        // alert("work");
    });
    
});

/* calaculate currency rate for deposit without refresh*/
$(document).ready(function(){
    $("#deposit").click(function(){
        let currency = document.getElementById("currency").value;
        // let plan = document.getElementById("plan").value;
        let amount = document.getElementById("amount").value;
        let user_id = document.getElementById("user_id").value;
        // alert(plan);
        $.ajax({
            type : "POST",
            url : "../controller/confirm_deposit.php",
            data : {currency:currency, amount:amount, user_id:user_id},
            success : function(response){
                $("#confirm_deposit").html(response);
            }
        })
        $("#invest").hide();
        $("#confirm_deposit").show();
        return false;
    })
})
/* calaculate currency rate for withdrawal without refresh*/
$(document).ready(function(){
    $("#withdraw").click(function(){
        let with_currency = document.getElementById("with_currency").value;
        let with_amount = document.getElementById("with_amount").value;
        let with_user_id = document.getElementById("with_user_id").value;
        let wallet = document.getElementById("wallet").value;
        // alert(plan);
        $.ajax({
            type : "POST",
            url : "../controller/confirm_withdraw.php",
            data : {with_currency:with_currency, with_amount:with_amount, with_user_id:with_user_id, wallet:wallet},
            success : function(response){
                $("#confirm_withdrawal").html(response);
            }
        })
        $("#withdrawal").hide();
        $("#confirm_withdrawal").show();
        return false;
    })
})
/* calaculate currency rate for transfer without refresh*/
$(document).ready(function(){
    $("#transfer_funds").click(function(){
        let trf_currency = document.getElementById("trf_currency").value;
        let trf_amount = document.getElementById("trf_amount").value;
        let trf_user_id = document.getElementById("trf_user_id").value;
        let balance = document.getElementById("balance").value;
        let rec_bank = document.getElementById("rec_bank").value;
        let rec_account = document.getElementById("rec_account").value;
        // alert(rec_bank);
        $.ajax({
            type : "POST",
            url : "../controller/confirm_transfer.php",
            data : {trf_currency:trf_currency, trf_amount:trf_amount, trf_user_id:trf_user_id, balance:balance, rec_bank:rec_bank, rec_account:rec_account},
            success : function(response){
                $("#confirm_transfer").html(response);
            }
        })
        $("#transfers").hide();
        $("#confirm_transfer").show();
        return false;
    })
})
/* search deposits by date */
$(document).ready(function(){
    $("#search_date").click(function(){
        let from = document.getElementById("from").value;
        let to = document.getElementById("to").value;
        
        $.ajax({
            type : "POST",
            url : "../controller/search_deposits.php",
            data : {from:from, to:to},
            success : function(response){
                $(".current_search").html(response);
            }
        })
        
        return false;
    })
})
/* SEARCH deposits by date for users */
$(document).ready(function(){
    $("#user_search_date").click(function(){
        let user_from = document.getElementById("user_from").value;
        let user_to = document.getElementById("user_to").value;
        let user_id_date = document.getElementById("user_id_date").value;
        
        $.ajax({
            type : "POST",
            url : "../controller/search_user_deposits.php",
            data : {user_from:user_from, user_to:user_to, user_id_date:user_id_date},
            success : function(response){
                $(".current_search").html(response);
            }
        })
        
        return false;
    })
})
/* view user */
function showUser(user_id){
    window.open("admin.php?user="+user_id, "_parent");
    return;
}
/* search users */
$(document).ready(function(){
    let $row = $('#user_table tbody tr');
    $('#searchUsers').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search currencies */
$(document).ready(function(){
    let $row = $('#cur_table tbody tr');
    $('#searchCurrency').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search deposit to approve */
$(document).ready(function(){
    let $row = $('#app_table tbody tr');
    $('#searchApp').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search withdrawals list */
$(document).ready(function(){
    let $row = $('#with_table tbody tr');
    $('#searchWith').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search deposit list */
$(document).ready(function(){
    let $row = $('#dep_table tbody tr');
    $('#searchDep').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* search card request list */
$(document).ready(function(){
    let $row = $('#card_table tbody tr');
    $('#searchCard').keyup(function() {
        let val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $row.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
})
/* play beep sound */
function playBeep(){
    let sound = new Audio('beep-07a.wav');
    sound.autoplay() = true;
    sound.loop = false;
    sound.play();
}
/* show chat icon after 5 seconds */
setTimeout(function(){
    $("#chat").show();
    playBeep();
}, 2000);

/* refresh chat section in intervals */
/* setInterval(function() {
    $("#chat2").load("views/admin.php #chat2");
}, 5000);
setInterval(function() {
    $("#chat2").load("views/users.php #chat2");
}, 5000); */

/* show chat close when chat button clicked */
$(".chat_close").click(function(){
    $(".chat_close").hide();
    document.querySelector(".chat_icon").style.display="flex";
    $(".chat_message").hide();
    playBeep();

})
$(".chat_icon").click(function(){
    $(".chat_icon").hide();
    $(".chat_close").show();
    $(".chat_message").show();
})

/* show first message */
setTimeout(function(){
    $("#chat1").show();
    playBeep();
}, 3000)
/* show second message */
/* setTimeout(function(){
    $("#chat2").show();
    playBeep();

}, 5000) */
/* show third message */
setTimeout(function(){
    $("#chat3").show();
    playBeep();

}, 30000)
/* show plan advert */
setTimeout(function(){
    $(".addverts").show();
    playBeep();

}, 30000)
/* close adds */
$(document).ready(function(){
    $("#learn").click(function(){
        $(".addverts").hide();
    })
})
$(document).ready(function(){
    $(".close_add").click(function(){
        $(".addverts").hide();
    })
})
/* send dm */
function sendDm(user){
    window.open("send_message.php?recipient="+user, "_blank");
}
$(document).ready(function(){
    $("#submit_chat").click(function(){
        let recipient = document.getElementById("recipient").value;
        let sender = document.getElementById("sender").value;
        let messages = document.getElementById("messages").value;
        // alert(messages);
        $.ajax({
            type : "POST",
            url : "../controller/send_chat.php",
            data : {recipient:recipient, sender:sender, messages:messages},
            success : function(response){
                $("#chat2").html(response);
            }
        })
        $("#messages").val('');
        return false;
    })
})

/* show edit wallet form */
$(document).ready(function(){
    $("#edit_pen").click(function(){
        $("#wallet_form").show();
    })
})
/* close edit wallet form */
$(document).ready(function(){
    $("#close_wallet").click(function(){
        $("#wallet_form").hide();
    })
})
/* edit wllet */
/* function editWallet(user){
    window.open("controller/edit_wallet.php?user"+user, "_parent");
    return;
} */

/* add currency without refresh */
$(document).ready(function(){
    $("#addCurrency").click(function(){
        let currency = document.getElementById("currency").value;
        let dollar_rate = document.getElementById("dollar_rate").value;
        // alert(currency);
        $.ajax({
            type : "POST",
            url : "../controller/add_currency.php",
            data : {currency:currency, dollar_rate:dollar_rate},
            success : function(response){
                $(".info").html(response);
            }
        })
        $("#currency").val('');
        $("#dollar_rate").val('');
        $("#currency").focus();
        return false;
    })
})

/* nav toggle */
$(document).ready(function(){
    $(".addMenu").click(function(){
        $(".nav2Menu").toggle();
        // $("#nav1Menu").hide();
        // $("#nav3Menu").hide();
        // $("#nav4Menu").hide();
    });
});

//display change price form
function displayPriceForm(form){
    document.querySelectorAll(".priceForm").forEach(forms=>{
        forms.style.display = "none";
    })
    document.querySelector(`#${form}`).style.display = "block";

}
//display price to change for individual item
document.addEventListener("DOMContentLoaded",function(){
    let prices = document.querySelectorAll(".each_prices");
    prices.forEach(price =>{
        price.onclick = function(){
            displayPriceForm(this.dataset.form);
            // console.log(this.dataset.form);
        }
    })
})
//close price form
$(document).ready(function(){
    $(".closeForm").click(function(){
        $(".priceForm").hide();
    })
})
/* change price without refresh */
$(document).ready(function(){
    $("#changePrize").click(function(){
        let item_prize = document.getElementById('item_prize').value;
        
        let item_id = document.getElementById('item_id').value;
        // alert(item_prize);
        $.ajax({
            type: "POST",
            url: "../controller/update_rate.php",
            data: {item_prize:item_prize, item_id:item_id},
            success: function(response){
                $(".each_prices").val(response);
                $(".priceForm").hide();
            }
        })
    return false;
    })
    
})

/* toggle notification messages */
function showNot(note){
    //hide all pages when one displays
    // document.getElementById("dashboard").style.display = "none";
    // $("#nav2Menu").hide();

    document.querySelectorAll('.details').forEach(div =>{
        div.style.display = "none";
    });
    document.querySelector(`#${note}`).style.display = "block";
}
//make links clickable to get to its respective page
document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll(".mess_navs").forEach(navs => {
        navs.onclick = function(){
            showNot(this.dataset.note);
            // $("#paid_receipt").hide();
            // document.getElementById("main_mess").style.display = "none";
            
        }
    })
})

/* approve deosit */
function approveDeposit(dep_id){
    let confirm_dep = confirm("Do you want to approve this deposit?", "");
    if(confirm_dep){
        window.open("../controller/approve_deposit.php?deposit_id="+dep_id, "_parent");
        return;
    }
}
/* approve card request */
function approveCard(card_id){
    let confirm_card = confirm("Do you want to approve this request?", "");
    if(confirm_card){
        window.open("../controller/approve_card.php?card_id="+card_id, "_parent");
        return;
    }
}
/* show request new card form */
/* $(document).ready(function(){
    $("#new_card").click(function(){
        $("#new_card_form").show();
        $("#current_card").hide();
    })
}) */
/* get earnings from user select */
$(document).ready(function(){
    $("#user_earn").on("change",function(){
        let user_earn = $(this).val();
        if(user_earn){
        // alert(user_earn);
            
            $.ajax({
                type : "POST",
                url : "../controller/get_earnings.php",
                data : {user_earn:user_earn},
                success: function(response){
                    $(".earning_val").html(response);
                }
            })
            return false;
        }else{
            $(".earning_val").html("<input type='text' value='Select client first'>");
        }
    })
})
/* update earnings without refresh */
$(document).ready(function(){
    $("#update_earnings").click(function(){
        let user_earn = document.getElementById('user_earn').value;
        
        let user_earning = document.getElementById('user_earning').value;
        // alert(user_earning);
        $.ajax({
            type: "POST",
            url: "../controller/update_earnings.php",
            data: {user_earn:user_earn, user_earning:user_earning},
            success: function(response){
                $(".info").html(response);
                // $(".priceForm").hide();
            }
        })
        $("#user_earning").val('');
        return false;
    })
    
})

/* view notification */
function viewMessage(not_id){
    window.open("notifications.php?message="+not_id, "_blank");
    return;
}
function updateScroll() {
    let element = document.querySelector(".all_chat");
    let elementHeight = element.scrollHeight;
    element.scrollTop = elementHeight
}
window.onload = updateScroll;

/* show live chat when pay button is clicked */
$(document).ready(function(){
    $("#live_chat").click(function(){
        $("#chat").show();
    })
})
/* get loan details from loan type select */
$(document).ready(function(){
    $("#loan_type").on("change",function(){
        let loan_type = $(this).val();
        if(loan_type){
        // alert(user_earn);
            
            $.ajax({
                type : "POST",
                url : "../controller/get_loan_type.php",
                data : {loan_type:loan_type},
                success: function(response){
                    $("#duration").html(response);
                }
            })
            return false;
        }else{
            $("#duration").html("<option>Select loan type first</option>");
        }
    })
})
/* display credit card request information */
$(document).ready(function(){
    $("#card_type").on("change",function(){
        let card_type = $(this).val();
        if(card_type){
        // alert(user_earn);
            
            $.ajax({
                type : "POST",
                url : "../controller/get_card_type.php",
                data : {card_type:card_type},
                success: function(response){
                    $("#card_fee").html(response);
                }
            })
            return false;
        }else{
            $("#card_fee").html("<input type='text' value='Select card type'>");
        }
    })
})
/* display proccessing information */
$(document).ready(function(){
    setTimeout(function(){
        $(".processing").hide();
    }, 5000);
    setTimeout(function(){
        $(".information").show();
    }, 5000);
})
