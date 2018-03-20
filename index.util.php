<?php
function showSystemInfo(){
  if (isset($_SESSION['success'])){
    echo('<p class="simple-text">'.$_SESSION['success'].'</p>');
    unset($_SESSION['success']);
  };
  if (isset($_SESSION['errro'])){
    echo('<p class="simple-text">'.$_SESSION['error'].'</p>');
    unset($_SESSION['error']);
  };
};

function showFormCustomerIntro(){
  if (!isset($_SESSION['name']) && !isset($_SESSION['signIn'])
      && !isset($_SESSION['logIn'])){
echo('<p class="simple-text">Please sign-in or log-in first</p>
    <form method="POST"><p class="simple-text">
    <input type="submit" name="signIn" value="Sign-in"></p></form>
    <form method="POST"><p class="simple-text">
    <input type="submit" name="logIn" value="Log-in"></p></form>');
  };
};

function showSignInForm(){
  if(isset($_SESSION['signIn'])){
  echo('<form method="POST">
    <p class="simple-text">Имя:</p>
    <p><input type="text" name="name" required></p>
    <p class="simple-text">Фамилия:</p>
    <p><input type="text" id="surname" name="surname" required></p>

    <p class="simple-text">Адрес электронной почты:</p>
    <p><input type="email" name="contact" required></p>
    <p class="simple-text">Пароль:</p>
    <p><input type="text" name="pw" required></p>
    <p><input type="submit" name="signInSubmit" value="Зарегистрироваться"></p>
    </form>
    <form method="post">
    <input type="submit" name="logOut" value="Cancel">
    </form>');
      };
};

function showLogInForm(){
  if(isset($_SESSION['logIn'])){
    echo('<form method="post">
    <p class="simple-text">Name: <input type="text" name="name">
    Password: <input type="password" name="pw">
    <input type="submit" name="logInSubmit" value="Log-in"></p>
    </form>
    <form method="post">
    <input type="submit" name="logOut" value="Cancel">
    </form>');
  };
};

function showMessageForm(){
  if(isset($_SESSION['name'])){
  echo('<p class="simple-text">Please submit your question with the following form!</p>');
    echo('<p><form method="POST">Ваш вопрос:</p>
        <textarea rows="10" cols="80" name="message" required></textarea>
        <p><input type="submit" name="messageSubmit" value="Отправить">
        </form></p>');
          };
};

function showLogOut(){
  if(isset($_SESSION['name'])){
    echo('<p><form method="post">
    <input type="submit" name="logOut" value="Log-out">
    </form></p>');
  };
};
?>
