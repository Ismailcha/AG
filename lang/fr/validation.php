<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Lignes de langue de validation
    |--------------------------------------------------------------------------
    |
    | Les lignes de langue suivantes contiennent les messages d'erreur par défaut utilisés par
    | la classe du validateur. Certaines de ces règles ont plusieurs versions telles
    | que les règles de taille. N'hésitez pas à ajuster chacun de ces messages ici.
    |
    */

    'accepted' => ':attribute doit être accepté.',
    'accepted_if' => ':attribute doit être accepté lorsque :other est :value.',
    'active_url' => ':attribute n\'est pas une URL valide.',
    'after' => ':attribute doit être une date postérieure à :date.',
    'after_or_equal' => ':attribute doit être une date postérieure ou égale à :date.',
    'alpha' => ':attribute doit contenir uniquement des lettres.',
    'alpha_dash' => ':attribute doit contenir uniquement des lettres, des chiffres, des tirets et des underscores.',
    'alpha_num' => ':attribute doit contenir uniquement des lettres et des chiffres.',
    'array' => ':attribute doit être un tableau.',
    'before' => ':attribute doit être une date antérieure à :date.',
    'before_or_equal' => ':attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'array' => ':attribute doit avoir entre :min et :max éléments.',
        'file' => ':attribute doit être entre :min et :max kilo-octets.',
        'numeric' => ':attribute doit être entre :min et :max.',
        'string' => ':attribute doit être entre :min et :max caractères.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation de :attribute ne correspond pas.',
    'current_password' => 'Le mot de passe est incorrect.',
    'date' => ':attribute n\'est pas une date valide.',
    'date_equals' => ':attribute doit être une date égale à :date.',
    'date_format' => ':attribute ne correspond pas au format :format.',
    'declined' => ':attribute doit être refusé.',
    'declined_if' => ':attribute doit être refusé lorsque :other est :value.',
    'different' => ':attribute et :other doivent être différents.',
    'digits' => ':attribute doit être composé de :digits chiffres.',
    'digits_between' => ':attribute doit être entre :min et :max chiffres.',
    'dimensions' => ':attribute a des dimensions d\'image invalides.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'doesnt_end_with' => ':attribute ne doit pas se terminer par l\'un des éléments suivants : :values.',
    'doesnt_start_with' => ':attribute ne doit pas commencer par l\'un des éléments suivants : :values.',
    'email' => ':attribute doit être une adresse e-mail valide.',
    'ends_with' => ':attribute doit se terminer par l\'un des éléments suivants : :values.',
    'enum' => 'La :attribute sélectionnée est invalide.',
    'exists' => 'La :attribute sélectionnée est invalide.',
    'file' => ':attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit avoir une valeur.',
    'gt' => [
        'array' => ':attribute doit avoir plus de :value éléments.',
        'file' => ':attribute doit être supérieur à :value kilo-octets.',
        'numeric' => ':attribute doit être supérieur à :value.',
        'string' => ':attribute doit être supérieur à :value caractères.',
    ],
    'gte' => [
        'array' => ':attribute doit avoir :value éléments ou plus.',
        'file' => ':attribute doit être supérieur ou égal à :value kilo-octets.',
        'numeric' => ':attribute doit être supérieur ou égal à :value.',
        'string' => ':attribute doit être supérieur ou égal à :value caractères.',
    ],
    'image' => ':attribute doit être une image.',
    'in' => 'La :attribute sélectionnée est invalide.',
    'in_array' => 'Le champ :attribute n\'existe pas dans :other.',
    'integer' => ':attribute doit être un entier.',
    'ip' => ':attribute doit être une adresse IP valide.',
    'ipv4' => ':attribute doit être une adresse IPv4 valide.',
    'ipv6' => ':attribute doit être une adresse IPv6 valide.',
    'json' => ':attribute doit être une chaîne JSON valide.',
    'lt' => [
        'array' => ':attribute doit avoir moins de :value éléments.',
        'file' => ':attribute doit être inférieur à :value kilo-octets.',
        'numeric' => ':attribute doit être inférieur à :value.',
        'string' => ':attribute doit être inférieur à :value caractères.',
    ],
    'lte' => [
        'array' => ':attribute ne doit pas avoir plus de :value éléments.',
        'file' => ':attribute doit être inférieur ou égal à :value kilo-octets.',
        'numeric' => ':attribute doit être inférieur ou égal à :value.',
        'string' => ':attribute doit être inférieur ou égal à :value caractères.',
    ],
    'mac_address' => ':attribute doit être une adresse MAC valide.',
    'max' => [
        'array' => ':attribute ne doit pas avoir plus de :max éléments.',
        'file' => ':attribute ne doit pas être supérieur à :max kilo-octets.',
        'numeric' => ':attribute ne doit pas être supérieur à :max.',
        'string' => ':attribute ne doit pas être supérieur à :max caractères.',
    ],
    'max_digits' => ':attribute ne doit pas avoir plus de :max chiffres.',
    'mimes' => ':attribute doit être un fichier de type : :values.',
    'mimetypes' => ':attribute doit être un fichier de type : :values.',
    'min' => [
        'array' => ':attribute doit avoir au moins :min éléments.',
        'file' => ':attribute doit être d\'au moins :min kilo-octets.',
        'numeric' => ':attribute doit être d\'au moins :min.',
        'string' => ':attribute doit être d\'au moins :min caractères.',
    ],
    'min_digits' => ':attribute doit avoir au moins :min chiffres.',
    'multiple_of' => ':attribute doit être un multiple de :value.',
    'not_in' => 'La :attribute sélectionnée est invalide.',
    'not_regex' => 'Le format de :attribute est invalide.',
    'numeric' => ':attribute doit être un nombre.',
    'password' => [
        'letters' => ':attribute doit contenir au moins une lettre.',
        'mixed' => ':attribute doit contenir au moins une lettre majuscule et une lettre minuscule.',
        'numbers' => ':attribute doit contenir au moins un chiffre.',
        'symbols' => ':attribute doit contenir au moins un symbole.',
        'uncompromised' => ':attribute fourni est apparu dans une fuite de données. Veuillez choisir un autre :attribute.',
    ],
    'present' => 'Le champ :attribute doit être présent.',
    'prohibited' => 'Le champ :attribute est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit lorsque :other est :value.',
    'prohibited_unless' => 'Le champ :attribute est interdit à moins que :other ne soit dans :values.',
    'prohibits' => 'Le champ :attribute interdit :other d\'être présent.',
    'regex' => 'Le format de :attribute est invalide.',
    'required' => 'Le champ :attribute est obligatoire.',
    'required_array_keys' => 'Le champ :attribute doit contenir des entrées pour :values.',
    'required_if' => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_if_accepted' => 'Le champ :attribute est obligatoire lorsque :other est accepté.',
    'required_unless' => 'Le champ :attribute est obligatoire à moins que :other ne soit dans :values.',
    'required_with' => 'Le champ :attribute est obligatoire lorsque :values est présent.',
    'required_with_all' => 'Le champ :attribute est obligatoire lorsque :values sont présents.',
    'required_without' => 'Le champ :attribute est obligatoire lorsque :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est obligatoire lorsque aucun de :values n\'est présent.',
    'same' => ':attribute et :other doivent correspondre.',
    'size' => [
        'array' => ':attribute doit contenir :size éléments.',
        'file' => ':attribute doit être de :size kilo-octets.',
        'numeric' => ':attribute doit être de :size.',
        'string' => ':attribute doit être de :size caractères.',
    ],
    'starts_with' => ':attribute doit commencer par l\'un des éléments suivants : :values.',
    'string' => ':attribute doit être une chaîne de caractères.',
    'timezone' => ':attribute doit être un fuseau horaire valide.',
    'unique' => ':attribute a déjà été pris.',
    'uploaded' => ':attribute n\'a pas pu être téléchargé.',
    'url' => ':attribute doit être une URL valide.',
    'uuid' => ':attribute doit être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Lignes de langue personnalisées pour la validation
    |--------------------------------------------------------------------------
    |
    | Ici, vous pouvez spécifier des messages de validation personnalisés pour les attributs en utilisant la
    | convention "attribute.rule" pour nommer les lignes. Cela nous permet de
    | spécifier rapidement une ligne de langue personnalisée spécifique pour une règle d'attribut donnée.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'message-personnalisé',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributs de validation personnalisés
    |--------------------------------------------------------------------------
    |
    | Les lignes de langue suivantes sont utilisées pour échanger notre espace réservé d'attribut
    | avec quelque chose de plus convivial comme "Adresse e-mail" au lieu de "email". Cela nous aide simplement à rendre notre message plus expressif.
    |
    */

    'attributes' => [],

];
