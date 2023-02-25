<?php

namespace App\Enums;

enum TicketStatus
{
    case Pendente;
    case Aguardando;
    case Respondido;
    case Finalizado;
}
