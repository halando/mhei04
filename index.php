<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD</title>
        <style>
            *{
                box-sizing: border-box;
            }
            form{
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                border: 1px black solid;
                padding: 15px;
            }
            input{
                width: 100%;
            }
            form>div{
                text-align: right;
            }
        </style>
    </head>
    <body>
        <a href="javascript:Regisztracio();">[Regisztráció]</a><a>[Bejelentkezés]</a><a href="javascript:Lekerdezes();">[Lekérdezés]</a>
        <hr />
        <div id="tartalom"></div>
        <?php
        // put your code here
        ?>
<!--        <form>
            <label for="nev">Név: </label><input id="nev" type="text" name="nev" />
            <label for="email">Email: </label><input id="email" type="email" name="email" />
            <label for="pwd1">Jelszó 1:</label><input id="pwd1" type="password" name="password" />
            <label for="pwd2">Jelszó 2:</label><input id="pwd2" type="password" />
            <div><button>Regisztráció</button></div>
        </form>-->
    </body>

    <script>
        function Regisztracio(){
            document.getElementById("tartalom").innerHTML=`<form onsubmit="Kuldes();">
            <label for="nev">Név: </label><input id="nev" type="text" name="nev" />
            <label for="email">Email: </label><input id="email" type="email" name="email" />
            <label for="pwd1">Jelszó 1:</label><input id="pwd1" type="password" name="password" />
            <label for="pwd2">Jelszó 2:</label><input id="pwd2" type="password" />
            <div><button>Regisztráció</button></div>
            </form>`;
        }
        
        function Kuldes(){
            event.preventDefault();
            xhr=new XMLHttpRequest();
            xhr.onreadystatechange=function(){
                if(xhr.status==200 && xhr.readyState==4){
                    document.getElementById("tartalom").innerHTML=xhr.responseText;
                }
            };
            xhr.open("PUT","taroloBackend.php",true);
            adatcsomag=document.getElementById("nev").value;
            adatcsomag+="|";
            adatcsomag+=document.getElementById("email").value;
            adatcsomag+="|";
            adatcsomag+=document.getElementById("pwd1").value;
            xhr.send(adatcsomag);
        }
        
        function Lekerdezes(){
            xhr=new XMLHttpRequest();
            xhr.onreadystatechange=function(){
                if(xhr.status==200 && xhr.readyState==4){
                    document.getElementById("tartalom").innerHTML=`
                        <table>
                            <thead>
                                <th>Név</th>
                                <th>Email</th>
                                <th>Jelszó</th>
                            </thead>
                            <tbody>
                               ${xhr.responseText}
                            </tbody>
                        </table>                    
                        `;
                }
            };
            xhr.open("GET","taroloBackend.php",true);
            xhr.send();
        }
    </script>
</html>