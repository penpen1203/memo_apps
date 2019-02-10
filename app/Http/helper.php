<?php
function delete_form($route, $label = '削除')
{
    $form = Form::open(['method' => 'DELETE', 'route' => $route, 'class' => 'd-inline']);
    $form .= Form::submit($label, ['class' => 'btn btn-danger']);
    $form .= Form::close();

    return $form;
}