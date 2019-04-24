<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About:';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
	     
    <?php
        echo Html::a('Signup', ['site/signup','id'=>Yii::$app->user->id], ['title'=>'Signup','class' => 'btn btn-success']);
        echo " &nbsp;";
        echo Html::a('Login', ['site/login','id'=>Yii::$app->user->id], ['title'=>'Login','class' => 'btn btn-success']);
	?>
	
	<p>Yii 2 PHP Api<br>
==========</p>

<p></p>

<p>The template is designed to work in a team development 
environment. It supports</p>
<p>deploying the application in different environments.</p>
<p>DIRECTORY STRUCTURE<br>
-------------------</p>

</font><font FACE="Courier New" SIZE="3" COLOR="#4444cc">
<p>```<br>
common<br>
config/ contains shared configurations<br>
mail/ contains view files for e-mails<br>
models/ contains model classes used in both backend and frontend<br>
tests/ contains tests for common classes <br>
console<br>
config/ contains console configurations<br>
controllers/ contains console controllers (commands)<br>
migrations/ contains database migrations<br>
models/ contains console-specific model classes<br>
runtime/ contains files generated during runtime<br>
frontend<br>
assets/ contains application assets such as JavaScript and CSS<br>
config/ contains frontend configurations<br>
controllers/ contains Web controller classes<br>
models/ contains frontend-specific model classes<br>
runtime/ contains files generated during runtime<br>
tests/ contains tests for frontend application<br>
views/ contains view files for the Web application<br>
web/ contains the entry script and Web resources<br>
widgets/ contains frontend widgets<br>
vendor/ contains dependent 3rd-party packages<br>
environments/ contains environment-based overrides<br>
```</p>
</font>
<p></p>

<p>The goal of the project is to develop a backend aplication that 
allows users to list, view, edit and delete customers.<br>
The customer data has to contain the following information, Name, 
Surnname, Id and Photo field. In adition, all customers will have a reference to 
whom created the register and the last one that updated the info, also the 
creation date time and the update date time.</p>

<p></p>

<p>The admin users, also can create and change status of the other 
users, edit the info or delete a user account.<br>
A github repositorie has been created https://github.com/Sergio-Tobares/agilemonkeys 
to share the code.</p>

<p></p>

<p>The users can signup in the aplication, but their status will be 
Pending as long as an Admin user don't validate them. Meanwhile they can login 
into the aplicaton but can only se their profile.</p>
<p>Users can algo reset the password , this will send an email with 
further instructions and a link to change the password and login again. <br>
When their status change and become a validated user they will 
be able to see all customers and perform the operations as described before.</p>

<p></p>

<p>The customer data allow to upload images to their profile, as a 
test it was limited to just the jpg format. This image is resized and can be 
updated any time.</p>

<p></p>

<p>The delete option in the users and customers, is only shown when the user is 
view, this was a limitation used just as a example.</p>
    
</div>
