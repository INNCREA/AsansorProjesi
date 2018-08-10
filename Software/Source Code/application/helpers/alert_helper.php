<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @Author: Umut Tepe
 * @Date:   2018-07-16 22:33:44
 * @Email: tepeumut1@gmail.com
 * @Last Modified by:   Asus
 * @Last Modified time: 2018-07-16 22:39:29
 */
function setAlertDanger($message)
{
	$msg = '<div class="alert alert-danger">';
	$msg .= $message;
	$msg .= '</div>';
	return $msg;
}
function setAlertSuccess($message)
{
	$msg = '<div class="alert alert-success">';
	$msg .= $message;
	$msg .= '</div>';
	return $msg;
}
function setAlertInfo($message)
{
	$msg = '<div class="alert alert-info">';
	$msg .= $message;
	$msg .= '</div>';
	return $msg;
}
function setAlertWarning($message)
{
	$msg = '<div class="alert alert-warning">';
	$msg .= $message;
	$msg .= '</div>';
	return $msg;
}