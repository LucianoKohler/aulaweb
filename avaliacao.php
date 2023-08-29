<?php
include "header.php"
    ?>
<main>
    <div class="jumbotron">

        <h1 class="text-center mb-4">Avaliação</h1>
    </div>
    <div class="card mx-auto bg-light p-3 text-center" style="width:450px;">
        <h1>Progresso do dia!</h1>
        <p id="status" style=" font-weight: bold;">O dia <span id="date" class="text-primary"></span> está <span
                id="percentage" class="text-primary"></span> completo!</p>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress" role="progressbar"
                style="width: 0%;"></div>
        </div>

        <h1 class="mt-3 border-top">Dia da semana</h1>
        <p>Veja que dia da semana é hoje!</p>
        <ul class="list-group">
            <li class="dia-semana list-group-item">Domingo</li>
            <li class="dia-semana list-group-item">Segunda-feira</li>
            <li class="dia-semana list-group-item">Terça-feira</li>
            <li class="dia-semana list-group-item">Quarta-feira</li>
            <li class="dia-semana list-group-item">Quinta-feira</li>
            <li class="dia-semana list-group-item">Sexta-feira</li>
            <li class="dia-semana list-group-item">Sábado</li>
        </ul>
        <h1 class="mt-3 border-top">Ano bissexto</h1>
        <p>Veja se um ano é bissexto!</p>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="bissexto">Ano: </span>
            </div>
            <input type="number" id="ano-input" class="form-control" aria-describedby="bissexto">
            <div class="input-group-append">
                <span onclick="bissextoCheck()" class="input-group-text btn btn-success" id="bissexto">Enviar</span>
            </div>
        </div>
        <p id="bissexto-info" class="mt-1 d-none">O ano de <span style="font-weight: bold;" id="ano-show">0000</span> <span style="font-weight: bold;" id="bissexto-condition">é</span> bissexto!</p>
    </div>
</main>
<script>
    let date = new Date(); //pegando a data atual

    //Pegando o dia mes e ano atuais;
    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();

    //colocando a data na dia
    let dateShowerDate = document.getElementById("date");
    dateShowerDate.innerHTML = `${day}/${month}/${year}`;

    //Fazendo a barra de progresso mudar dinamicamente conforme o dia passa!
    let totalSecondsOfTheDay = date.getSeconds() + (date.getMinutes() * 60) + (date.getHours() * 60 * 60);//Pega a quantidade de segundos que já passou do dia
    let Percentage = Math.round(totalSecondsOfTheDay * 100 / 86400)//Faz uma regra de três para pegar a porcentagem do dia que passou
    /*A regra de três:

    valores   |   porcentagem
    86400         - 100%
    totalsec...   - x%

    sendo 86400 a quantidade de segundos em um dia;
    e totalsec sendo a variável totalSecondsOfTheDay;

    */

    //Agora só falta atualizar a barra de progresso com a nossa porcentagem.
    let progressBar = document.getElementById("progress")
    let percentageSpan = document.getElementById("percentage");
    progressBar.style.width = Percentage + "%";
    progressBar.innerHTML = Percentage + "%"
    percentageSpan.innerHTML = Percentage + "%"

    //Código para pegar o dia da semana automaticamente
    let DayOfTheWeek = date.getDay();

    //Pega o n-ésimo elemento da lista, onde n é o dia da semana pego acima (que varia de 0 a 6)
    document.getElementsByClassName("dia-semana")[DayOfTheWeek].classList.add("active")


    //Código para checar se o ano é bissexto
    function bissextoCheck(){//função chamada ao clicar no botão enviar
        let year = document.getElementById("ano-input").value;

        document.getElementById("ano-show").innerHTML = year;//Coloca o ano no texto futuramente aparecido

        if(year%100!= 00 && (year%100)%4 == 0){//Condicional para colocar o veredito no texto futuramente aparecido
            document.getElementById("bissexto-condition").innerHTML = "é";
        }else{
            document.getElementById("bissexto-condition").innerHTML = "não é";
        }
        document.getElementById("bissexto-info").classList.remove("d-none"); //Mostra o texto na tela
    }

</script>
<?php
include "footer.php"
?>