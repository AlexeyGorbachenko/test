"use strict"

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('allform');
    form.addEventListener('submit', formSend);

    async function formSend(e) {
        e.preventDefault();

        

        let formData = new FormData(allform);    

        
            let response = await fetch('sendmail.php', {
                method: 'POST',
                body: formData                
            });
            if (response.ok) {
                let result = await response.json();
                alert(result.message);
                allform.reset();
            }
            else {
                alert("Ошибка")
            }

         
    }

    
    

    function emailTest(input) {
        return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);

    }
});

