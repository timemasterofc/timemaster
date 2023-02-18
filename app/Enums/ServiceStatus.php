<?php

namespace App\Enums;

enum ServiceStatus
{
    case Pendente;
    case Negociando;
    case Executando;
    case Finalizado;
    case Cancelado;

}
