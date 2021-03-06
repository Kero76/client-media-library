<?php
    /**
     * MediaClient.
     * Copyright (C) 2017 Nicolas GILLE
     *
     * This program is free software: you can redistribute it and/or modify
     * it under the terms of the GNU General Public License as published by
     * the Free Software Foundation, either version 3 of the License, or
     * (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful,
     * but WITHOUT ANY WARRANTY; without even the implied warranty of
     * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     * GNU General Public License for more details.
     *
     * You should have received a copy of the GNU General Public License
     * along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

    declare(strict_types=1);

    namespace MediaClient\Form\Media\Type;

    use MediaClient\Form\DataTransformer\StringToArrayTransformer;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\NumberType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\Validator\Constraints\NotBlank;
    use Symfony\Component\Validator\Constraints\Range;

    class MusicType extends AbstractType {

        /**
         * Build form on twig template.
         *
         * @param \Symfony\Component\Form\FormBuilderInterface $builder
         *  Interface to build form.
         * @param array $options
         *  Options to build form.
         *
         * @since 1.0
         * @version 1.0
         */
        public function buildForm(FormBuilderInterface $builder, array $options) {
            $builder
                ->add(
                    'title',
                    TextType::class,
                    array(
                        'label_format' => 'title_label',
                        'required' => true,
                        'constraints' => array(
                            new NotBlank(),
                        ),
                    )
                )
                ->add(
                    'releaseDate',
                    DateType::class,
                    array(
                        'label_format' => 'release_date_label',
                        'required' => true,
                        'widget' => 'single_text',
                    )
                )
                ->add(
                    'supports',
                    TextType::class,
                    array(
                        'label_format' => 'supports_label',
                        'required' => true,
                    )
                )
                ->add(
                    'genres',
                    TextType::class,
                    array(
                        'label_format' => 'genres_label',
                        'required' => true,
                    )
                )
                ->add(
                    'nbTracks',
                    NumberType::class,
                    array(
                        'label_format' => 'number_of_tracks_label',
                        'required' => true,
                        'constraints' => array(
                            new Range(
                                array(
                                    'min' => 0,
                                )
                            ),
                        ),
                    )
                )
                ->add(
                    'length',
                    NumberType::class,
                    array(
                        'label_format' => 'length_label',
                        'required' => true,
                        'constraints' => array(
                            new Range(
                                array(
                                    'min' => 0,
                                )
                            ),
                        ),
                    )
                )
                ->add(
                    'synopsis',
                    TextareaType::class,
                    array(
                        'label_format' => 'synopsis_label',
                        'attr' => array(
                            'rows' => 5,
                        ),
                    )
                )
                ->add(
                    'labelRecords',
                    TextareaType::class,
                    array(
                        'label_format' => 'label_records_label',
                        'attr' => array(
                            'rows' => 3,
                        ),
                    )
                )
                ->add(
                    'singers',
                    TextareaType::class,
                    array(
                        'label_format' => 'singers_label',
                        'attr' => array(
                            'rows' => 3,
                        ),
                    )
                );

            $builder->get('genres')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('supports')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('labelRecords')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('singers')
                    ->addModelTransformer(new StringToArrayTransformer());
        }

        /**
         * Return the name of the form object.
         *
         * @return string
         *  The name of form object.
         * @since 1.0
         * @version 1.0
         */
        public function getName(): string {
            return 'music-form';
        }
    }
