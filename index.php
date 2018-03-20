<?php
require_once "pdo.php";
require_once "index.util.php";
session_start();

//  SIGN-IN //
if (isset($_POST['signIn'])){
      $_SESSION['signIn'] = $_POST['signIn'];
      header('Location: index.php');
      return;
};

if (isset($_POST['signInSubmit']) && isset($_POST['name'])
    && isset($_POST['surname']) && isset($_POST['contact'])
    && isset($_POST['pw'])) {

    $sql = "INSERT INTO customer (name, surname, contact, pw)
              VALUES (:name, :surname, :contact, :pw)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':surname' => $_POST['surname'],
        ':contact' => $_POST['contact'],
        ':pw' => $_POST['pw']));
    $_SESSION['success'] = 'Record Added';
    unset($_SESSION['signIn']);
    header( 'Location: index.php' ) ;
    return;
}
//  LOG-IN  //
if (isset($_POST['logIn'])){
      $_SESSION['logIn'] = $_POST['logIn'];
      header('Location: index.php');
      return;
};

if (isset($_POST['logInSubmit']) && isset($_POST['name']) && isset($_POST['pw'])){
  $stmt = $pdo->prepare("SELECT * FROM customer WHERE name = :name");
  $stmt->execute(array(":name" => $_POST['name']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($_POST['pw'] == $row['pw']){
      $_SESSION['name'] = $_POST['name'];
      $_SESSION['customer_id'] = $row['customer_id'];
      $_SESSION['success'] = $_SESSION['name'].", you are logged in!";
      unset($_SESSION['logIn']);
      header('Location: index.php');
      return;
    } else {
      $_SESSION['error'] = 'Password is incorrect!';
      header('Location: index.php');
      return;
    };
};
// LOG-OUT  //
if (isset($_POST['logOut'])){
      header('Location: log-out.php');
      return;
};
//  SUBMIT MESSAGE  //
if (isset($_POST['messageSubmit']) && isset($_POST['message'])){
  $sql = "INSERT INTO message (customer_id, message)
        VALUES (:customer_id, :message)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
  ':customer_id' => $_SESSION['customer_id'],
  ':message' => $_POST['message']));
$_SESSION['success'] = 'Message has been sent';
header( 'Location: index.php' ) ;
return;
};

?>
<html lang="ru" >
<head>
<meta charset="UTF-8">
<meta name="description" content="Надежный адрес в Варшаве для Вашей переписки">
<meta name="keywords" content="adres,Polska,korespondencja,wirtualne,biuro,Warszawa,адрес,Варшава,переписка,корреспонденция,poczta,почта">
<meta name="author" content="Jarosław H. Kulik">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Адрес-Варшава</title>
<link rel="icon" href="https://cdn3.iconfinder.com/data/icons/around-the-world/64/world_tourism_famous_place_sightseeing_21-512.png"/>
<link rel="stylesheet" href="final.v10.style.css">
</head>
<body>
  <div class="menu text">
  <p>Меню</p>
</div>
<header class="header-big text">
  <nav class="header-main">
      <div class="header0 headers">
      <a class="nav-text main-button"><p>Главная<p></a>
    </div>
  <div class="header2 headers">
      <a class="nav-text about-button"><p>Обо мне</p></a>
    </div>
  <div class="header3 headers">
      <a class="nav-text address-button"><p>Адрес-Варшава</p></a>
    </div>
      <div class="header4 headers">
      <a class="nav-text consult-button"><p>Юридическая консультация</p></a>
    </div>
          <div class="header1 headers">
      <a class="nav-text contact-button"><p>Контакты</p></a>
    </div>
    </nav>
</header>
<header class="header-mob text head-mob-unit">
  <nav class="header-main">
      <div class="header0 headers">
      <a class="nav-text main-button"><p>Главная<p></a>
    </div>
  <div class="header2 headers">
      <a class="nav-text about-button"><p>Обо мне</p></a>
    </div>
        </nav>
</header>
<header class="header-mob text head-mob-unit">
  <nav class="header-main">
          <div class="header1 headers">
      <a class="nav-text contact-button"><p>Контакты</p></a>
    </div>
    </nav>
</header>
<header class="header-mob text head-mob-unit">
  <nav class="header-main">
  <div class="header3 headers">
      <a class="nav-text address-button"><p>Адрес-Варшава</p></a>
    </div>
        </nav>
</header>
<header class="header-mob text head-mob-unit">
  <nav class="header-main">
      <div class="header4 headers">
      <a class="nav-text consult-button"><p>Юридическая консультация</p></a>
    </div>
    </nav>
</header>

<div class="main-text text main">
<h1>Добро пожаловать в Польшу!</h1>
<p class="simple-text">Годы работы в юиридической канторе показали мне насколько важно обеспечить своевременный и надлежащий обмен корреспонденцией  в процессуальном производстве. Получение процессового письма  влечет за собой многие юридические последствия в независимости от того, имеем ли мы дело с уголовным, гражданским или административным правом. Затрону важнейшие из них – это отсчет срока подачи жалоб и апелляций, а также вступление в законную силу окончательных решений государственных органов и судебных постановлений. Таким образом, эти вопросы являются очень важными для участника процесса.</p>
<p class="simple-text">Как правило корреспонденция, отправляемая польскими государственными органами,  доставляется только на адрес, находящийся на территории Польши. Это обстоятельство, имеет особое значение, когда сторона, участвующая в разбирательстве, является лицом, проживающим за пределами территории Польши или лицом, которое не имеет возможности своевременно получить корреспонденцию по указанному им адресу. Корреспонденция, не полученная в установленный срок или отсутствие корреспонденционного адреса может  исключить инициирование или проведение процессуального производства, что может привести к катастрофическим последствиям для стороны такого разбирательства.</p>
<p class="simple-text">Осознавая последствия неспособности указать надежный и доступный адрес для ведения официальной переписки, я хотел бы предложить Вам услугу <strong>Адрес-Варшава</strong>.  В рамках указанной услуги я предоставляю Вам надежный почтовый адрес в Варшаве. Входящая корреспонденция поступает ежедневно, а затем передается Вам в ранее согласованной форме, в том числе в электронной  форме. Вы можете узнать больше об услуге <strong>Адрес-Варшава</strong> <a href="address-warsaw.html" class="nav-text">по этой ссылке</a>.</p>
  <p class="simple-text">Помимо услуги <strong>Адрес-Варшава</strong>, также хотел бы предложить Вам услугу юридической консультации, в сфере гражданского, административного, в том числе законодательства касающигося иностранных граждан, и налогового права. Вы можете  узнать  больше  об услуге <strong>Юридическая консультация</strong> <a href="consult.html" class="nav-text">по этой ссылке</a>.</p>
  <p class="signature">Ярослав Х. Кулик</p>
</div>
<div class="main-text text about">
<h1>Рад познакомиться!</h1>
<p class="simple-text">Мой опыт в сфере юриспруденции составляет более  шести лет. Ранее сотрудничал с юридическими канторами  Мариус Прус Кантора Налогового Советника и Прус и Шимчак Адвокаты и Налоговые советники.</p>
<p class="simple-text">У меня есть опыт в сфере гражданского, административного и налогового права, в том числе ведение делопроизводств и разбирательств в государственных органах и судах. Мои профессиональные интересы сосредоточены на налоговом праве и законах, касающихся иностранных граждан.</p>
<p class="simple-text">Владею свободно польским, русским и английским языками. Я окончил юридический факультет Варшавского Университета специализируясь в сфере налогового права.</p>
  <p class="signature">Ярослав Х. Кулик</p>
</div>
<div class="main-text text address">
<h1>Услуга Адрес-Варшава</h1>
<p class="simple-text">В рамках услуги <strong>Адрес-Варшава</strong> предлагаю Вам воспользоваться адресом для ведения корреспонденции в Варшаве. Входящая корреспонденция после получения предоставдяется Вам не позднее следующего дня в ранее согласованной форме. Например отправление в формате pdf на указанный Вами адрес электронной почты.</p>
<p class="simple-text"> Размер вознаграждения за услугу​ <strong>Адрес-Варшава</strong> зависит от типа процессуального производства, в котором будет указан в качестве адреса, адрес предоставленной в рамках услуги <strong>Адрес-Варшава</strong>. Минимальное вознаграждение составляет 60 злотых и включает в себя получение 4 (четырех) простых или регистрируемых почтовых писем.  Это число, по существу, соответствует количеству писем, отправленных государственными органами в типичной процедуре.</p>
<p class="simple-text"> Услуга предоставляется следующим образом:
   <ul class="site-nav">
      <li  class="simple-text">Пользуясь <a class="nav-text button"> контактной формой</a>, Вам необходимо предявить желание воспользоваться услугой <strong>Адрес- Варшава</strong> указав:
        <ol class="site-nav">
          <li>имя и фамилию;</li>
          <li>тип процессуального переписки, для которогой будет использован <strong>Адрес- Варшава</strong>;</li>
          <li>адрес электронной почты, номер телефона или другие средства связи (например whatsapp); </li>
          <li>предпочтительный способ отправления Вам полученной корреспонденцией.</li>
      </ol>
</li>
      <li class="simple-text">После получения сообщения, отправленного Вами с вышеуказанными данными, я предоставлю Вам информацию о адресе <strong>Адрес-Варшава</strong> вместе с образцом для заполнения  бланка почтовой доверенности.
      </li>
      <li class="simple-text">Почтовую доверенность, заполненную Вами согласно присланному мною образцу, Вы оплачиваете и регистрируете  в выбранном Вами почтовом отделении на территории Польши. Затем сотрудники почтового отделения отправят Вашу доверенность на адрес соответствующего почтового отделения <strong>Адрес-Варшава</strong>. После регистрации доверенности, пожалуйста, используя <a class="nav-text  button"> контактную форму </a> для отправки  адреса почтового отделения, в котором была зарегистрирована Вами доверенность и подтверждение денежного перевода вознаграждения на ранее указанный мной номер банковского счета.
      </li>
<li class="simple-text">Входящая корреспонденция будет передана Вам не позднее следующего рабочего дня после ее получения, при условии предварительной оплаты Вами моего вознаграждения.
      </li>
      </ul>
<p class="simple-text">Если у Вас есть дополнительные вопросы относительно услуги<strong> Адрес-Варшава</strong> рекомендую Вам связаться со мной используя <a class="nav-text button"> контактную форму</a>.</p>
  <p class="signature">Ярослав Х. Кулик</p>
</div>
<div class="main-text text consult">
<h1>Юридическая консультация</h1>
<p class="simple-text"> Минимальное вознаграждение составляет 60 злотых и включает в себя получение 4 (четырех) простых или регистрируемых почтовых писем. Это число, по существу <a class="nav-text button button"> контактную форму</a>, соответствует количеству писем, отправленных государственными органами в типичной процедуре.</p>
  <p class="signature">Ярослав Х. Кулик</p>
</div>
<div class="main-text text contact">
<h1>Контактная форма</h1>
<p class="simple-text">Если у Вас есть дополнительные вопросы относительно услуги Адрес-Варшава или Юридической консультациинапишите мне через контактную форму.</p>
<?php
showSystemInfo();
showFormCustomerIntro();
showSignInForm();
showLogInForm();
showMessageForm();
showLogOut();
?>
  </div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script  src="final.v2.index.js"></script>
</body>
</html>
