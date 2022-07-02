<div class="pds">
    <div class="imagesLogo">
    <img class="staticimg" src="Front/images/t1.jpg" alt="" />
    <a href="http://power-dbworld.pl/"><img class="staticimg" src="Front/images/t2.jpg" alt="" /></a>
    <img class="staticimg" src="Front/images/t3.jpg" alt="" />
    </div>
    
    <div class="dollogo w-auto  pb-4"><span>Na tym serwerze <font color="red">manarune</font> mozesz kupic za walute w grze !</span></div>
    <div class="s" >
        <div class="p3">
            <div class="menupic"></div>
            <div class="menu" align="center">
                <a href="index.php"><b>Newsy</b></a>
                <a href="index.php"><font color="green"><b>Bonusy</b></font></a>
                <a href="index.php"><b>Regulamin</b></a>
                <a href="index.php"><b>Download</b></a>
                <div class="spolecznosc"></div>

                <a href="index.php?id=guild&amp;page=list"><b>Gildie</b></a>
                <a href="{{stat}}"><b>Statystyki</b></a>

                <div class="biblioteka"></div>

                <a href="{{aboutus}}"><b>Mapa</b></a>
                <a href="index.php?id=czary"><b>Czary</b></a>

                    </div>
            <div class="sonda"></div>
            <div class="logowanie" align="center">
              </div>
             </div>


             

<div class="p2">
    <div class="tresc">

    </div>
</div>
<div class="p3">

    <div class="login"></div>
    {{dump(userisLogIn)}}
    {% if userisLogIn %}
    <div class="logowanie" align="center">
        <a href="{{logout}}"><font color="red"><b>Wyloguj się!</b></font></a>
       test123
    </div>
    {% else %}
    <div class="logowanie" align="center">

        <form action="./login" method="post">
            <b>Numer:</b>
            <input class="input_color" name="account" type="password" value="" />
            <b>Haslo:</b>
            <input name="password" type="password" value="" class="input_color"/>
            <br><br><input type="image" src="Front/images/zaloguj_sie.gif" alt="submit" value="Zaloguj" />
        </form><br />
        <div class="menu"><center>
            <a href="{{register}}"><font color="red"><b>Zarejestruj się!</b></font></a>
            <a href="index.php?id=recoverback"><b>Odzyskaj Konto!</b></a></center></div>
    </div>
    {% endif %}




<div class="status"></div>

<center>
    Offline
</center>
    <div class="logowanie" align="center">
        <div class="szukajgracza"></div><br />
        <form action="index.php" method="get">
            <input type="hidden" name="id" value="info" />
            <input type="hidden" name="act" value="players" />
            <input class="input_color" type="text" name="char" maxlength="15" />
            <br><br><input type="image" src="Front/images/szukaj.gif" alt="submit" value="Szukaj" /><br /><br />
        </form>
    </div>

    <div class="eventy"></div>
    <div class="menu" align="center">
        <b><a href="?body=eventy"><font color="#ff9933" size='2'>Brak eventów</font><br></a>
    </div>


</div>
<div style="clear:both"></div>
    </div>
    <div class="stopka"><span>



    </div>
</div>




</body>
</html>