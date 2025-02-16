<?php

    namespace Enums;

    enum TypeFile: string{
        case CONTROLEUR = 'ControleurGeneral';
        case MANAGER = 'modele/Manager';
        case TEMPLATE = 'Template';
    }

?>