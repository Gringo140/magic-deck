<?php


namespace MagicDeck\Form;


interface FormInterface
{
    /*
     * / **
     * Remplir l'entité avec les données de demande
     transtypées      *
     * @param $ entity mixed
     * @return array error list
     */
    public function fill($entity): array;

    /*
     * La forme est-elle valide
     */
    public function isValid(): bool;

    /*
     * Le formulaire est-il soumis
     */
    public function isSubmitted(): bool;
}