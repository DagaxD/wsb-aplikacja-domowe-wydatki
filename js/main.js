(function ($) {

    "use strict";
    $('.input').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })

//validate
    $('.validate-input .input').each(function(){
        $(this).on('blur', function(){
            if(validate(this) == false){
                showValidate(this);
            }
            else {
                $(this).parent().addClass('true-validate');
            }
        })    
    })

    var input = $('.validate-input .input');

    $('.validate-form').on('submit',function(){
        var check = true;

        for (var i=0; i<input.length; i++) {
            if (validate(input[i]) == false){
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });
    $('#registerButton').on('click', function (e) {
        e.preventDefault();
        var form = $('#registerForm');
        var login = form.find( "input[name='login']" ).val();
        var pass = form.find( "input[name='pass']" ).val();
        var repeatpass = form.find( "input[name='repeat-pass']" ).val();
        var name = form.find( "input[name='name']" ).val();
        var email = form.find( "input[name='email']" ).val();

        if (repeatpass !== pass) {
            alert('Hasła się nie zgadzają!')
            return false;
        }
        var posting = $.post( "api/register.php", { "name": name, "email": email, "pass": pass, "repeat-pass": repeatpass, "username": login } );
 
        posting.done(function( data ) {
            location.href = 'login.html';
            
        }).catch(function(ex){
            console.log(ex);
        });
      
    })
    $('#loginButton').on('click', function (e) {
        e.preventDefault();
        var form = $('#loginForm');
        var login = form.find( "input[name='login']" ).val();
        var pass = form.find( "input[name='pass']" ).val();

        var posting = $.post( "api/login.php", { "pass": pass, "login":login } );
 
        posting.done(function( data ) {
            location.href = 'dashboard.php';
            
        }).catch(function(ex){
            console.log(ex);
        });
      
    })

    $('.validate-form .input').each(function(){
        $(this).focus(function(){
           hideValidate(this);
           $(this).parent().removeClass('true-validate');
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    var name= $("#hdnSessionName").data('value');
    var email= $("#hdnSessionEmail").data('value');
    var login= $("#hdnSessionLogin").data('value');

    $('#userName').text(name);
    $('#userEmail').text(email);
    $('#userLogin').text(login);
    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    $('#startSaving').on('click', function () {
        window.location.href = 'wydatki.php'
    })

    let allOutcomes = [];
    function getAllOutcomes(outcome) {
        allOutcomes.push(outcome);
        console.log(outcome, allOutcomes)
    }
console.log(allOutcomes)
    $('#addOutcome').on('click', function (allOutcomes) {
       let newOutcome = $('#newOutcome').val();
       getAllOutcomes(newOutcome);
        let outcomeAmount = $('#outcomeAmount').val();
        
        $('#allOutcomes').append('<li value='+newOutcome+'>'+newOutcome+': '+outcomeAmount+'</li>');
        
        $.post( "api/expense.php", { name: newOutcome, amount: outcomeAmount, repeating: 1})
        .done(function( data ) {
          alert( "Data Loaded: " + data );
        });

        
    })
    let monthOutcomes = [];
    function getMonthOutcomes (monthoutcome) {
        monthOutcomes.push(monthoutcome);
    }
    $('#thisMonthOutcomeButton').on('click', function (){
        let monthOutcome = $('#thisMonthOutcome').val();
        let monthOutcomeAmount = $('#thisMonthOutcomeAmount').val();
        getMonthOutcomes(monthOutcome);
        $('#thisMonthOutcomes').append('<li value='+monthOutcome+'>'+monthOutcome+': '+monthOutcomeAmount+'</li>');
        $.post( "api/expense.php", { name: monthOutcome, amount: monthOutcomeAmount, planned: 1})
        .done(function( data ) {
          alert( "Data Loaded: " + data );
        });
    })

    let monthIncomes = [];
    function getMonthIncomes (monthincome) {
        monthIncomes.push(monthincome);
    }
    $('#thisMonthIncomeButton').on('click', function (){
        let monthIncome = $('#thisMonthIncome').val();
        let monthIncomeAmount = $('#thisMonthIncomeAmount').val();
        getMonthIncomes(monthIncome);
        $('#thisMonthIncomes').append('<li value='+monthIncome+'>'+monthIncome+': '+monthIncomeAmount+'</li>');
        $.post( "api/expense.php", { name: monthIncome, amount: monthIncomeAmount, income: 1})
        .done(function( data ) {
          alert( "Data Loaded: " + data );
        });
    })

    function getOutcomesList () {
        // $.get("api/expense.php")
        // .done(function (data) {
            var data = {
                "expenses": [
                    {"id":15,"user_id":1,"name":"hjfshjfsjh","amount":"33.00","date":"2019-07-14","repeating":true,"planned":false,"income":false},
                    {"id":16,"user_id":1,"name":"kjjjhsfdhjh","amount":"1233.00","date":"2019-07-14","repeating":false,"planned":false,"income":true},
                    {"id":17,"user_id":1,"name":"fdfd","amount":"23.00","date":"2019-07-18","repeating":true,"planned":false,"income":false},
                    {"id":18,"user_id":1,"name":"hjfshjfsjh","amount":"63.00","date":"2019-07-14","repeating":true,"planned":false,"income":false},
                    {"id":19,"user_id":1,"name":"ffdfd","amount":"38.00","date":"2019-07-14","repeating":true,"planned":false,"income":false},
                    {"id":20,"user_id":1,"name":"hjfshjfsjh","amount":"993.00","date":"2019-07-14","repeating":false,"planned":true,"income":false},
                ]
            };

            var sum = 0.0;
            let sumRepeating = 0;
            let sumMonth = 0;
            let sumIncomes = 0;
            let theRest = 0;
            console.log(data.expenses)
            let i;
            for (i=0; i<data.expenses.length; i++) {
                if (data.expenses[i].repeating == true) {
                    $('#allOutcomes').append('<li value='+data.expenses[i].name+'>'+data.expenses[i].name+': '+data.expenses[i].amount+'</li>');
                    let parsedAmount = parseFloat(data.expenses[i].amount);
                    sumRepeating += parsedAmount;
                    $('#sumAll').text(sumRepeating)
                }
                if (data.expenses[i].planned == true) {
                    $('#thisMonthOutcomes').append('<li value='+data.expenses[i].name+'>'+data.expenses[i].name+': '+data.expenses[i].amount+'</li>');
                    let parsedAmount = parseFloat(data.expenses[i].amount);
                    sumMonth += parsedAmount;
                    $('#sumMonth').text(sumMonth)
                }

                if(data.expenses[i].income == true) {
                    $('#thisMonthIncomes').append('<li value='+data.expenses[i].name+'>'+data.expenses[i].name+': '+data.expenses[i].amount+'</li>');
                    let parsedAmount = parseFloat(data.expenses[i].amount);
                    sumIncomes += parsedAmount;
                    $('#sumIncomes').text(sumIncomes)
                }
                theRest = sumIncomes - (sumRepeating + sumMonth);
                $('#theRest').text(theRest);
            }
            
        // })
    }

getOutcomesList();
})(jQuery);