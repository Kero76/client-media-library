<?php
    /*
     * This file is part of Media-Client.
     *
     * Media-Client is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * Media-Client is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with Media-Library. If not, see <http://www.gnu.org/licenses/>.
     */
    declare(strict_types=1);
    
    namespace MediaClient\Form\Inscription;
    
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;

    /**
     * Class InscriptionType
     *
     * @author Nicolas GILLE
     * @package MediaClient\Form\Inscription
     * @since 1.0
     * @version 1.0
     */
    class InscriptionType extends AbstractType {
    
        /**
         * Build form on twig template.
         *
         * @param \Symfony\Component\Form\FormBuilderInterface $builder
         *  Interface to build form.
         * @param array $options
         *  Options to build form.
         * @since 1.0
         * @version 1.0
         */
        public function buildForm(FormBuilderInterface $builder, array $options) {
            $builder
                ->add('username', TextType::class)
                ->add('password', PasswordType::class)
                ->add('email', EmailType::class);
        }
    
        /**
         * Return the name of the form object.
         *
         * @return string
         *  The name of form object.
         * @since 1.0
         * @version 1.0
         */
        public function getName() : string {
            return 'inscription';
        }
    }
