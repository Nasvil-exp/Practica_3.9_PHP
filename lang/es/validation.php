<?php

return [
    'confirmed' => 'El campo :attribute no coincide con su confirmación.',
    'required' => 'El campo :attribute es obligatorio.',
    'email' => 'El campo :attribute debe ser un correo válido.',
    'unique' => 'El campo :attribute ya está registrado.',
    'string' => 'El campo :attribute debe ser texto.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'date' => 'El campo :attribute debe ser una fecha válida.',
    'exists' => 'El usuario seleccionado no existe.',
    'in' => 'El valor seleccionado para :attribute no es válido.',
    'not_in' => 'El usuario seleccionado no es válido.',

    'min' => [
        'numeric' => 'El campo :attribute debe ser como mínimo :min.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],

    'max' => [
        'numeric' => 'El campo :attribute no puede superar :max.',
        'string' => 'El campo :attribute no puede superar :max caracteres.',
    ],

    'attributes' => [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'password' => 'contraseña',
        'title' => 'título',
        'description' => 'descripción',
        'due_date' => 'fecha límite',
        'status' => 'estado',
        'user_id' => 'usuario',
        'role' => 'rol',
        'contribution_hours' => 'horas de contribución',
    ],
];
