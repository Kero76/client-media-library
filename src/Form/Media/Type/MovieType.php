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

    class MovieType extends AbstractType {

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
                    'originalTitle',
                    TextType::class,
                    array(
                        'label_format' => 'original_title_label',
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
                    'runtime',
                    NumberType::class,
                    array(
                        'label_format' => 'runtime_label',
                        'required' => true,
                        'constraints' => array(
                            new Range(
                                array(
                                    'min' => 0,
                                    'max' => 300,
                                )
                            ),
                        ),
                    )
                )
                ->add(
                    'languagesSpoken',
                    TextType::class,
                    array(
                        'label_format' => 'languages_spoken_label',
                        'required' => true,
                    )
                )
                ->add(
                    'subtitles',
                    TextType::class,
                    array(
                        'label_format' => 'subtitles_label',
                        'required' => true,
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
                    'mainActors',
                    TextareaType::class,
                    array(
                        'label_format' => 'actors_label',
                        'attr' => array(
                            'rows' => 3,
                        ),
                    )
                )
                ->add(
                    'producers',
                    TextareaType::class,
                    array(
                        'label_format' => 'producers_label',
                        'attr' => array(
                            'rows' => 3,
                        ),
                    )
                )
                ->add(
                    'directors',
                    TextareaType::class,
                    array(
                        'label_format' => 'directors_label',
                        'attr' => array(
                            'rows' => 3,
                        ),
                    )
                );

            $builder->get('genres')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('supports')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('mainActors')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('languagesSpoken')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('subtitles')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('producers')
                    ->addModelTransformer(new StringToArrayTransformer());
            $builder->get('directors')
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
            return 'movie-form';
        }
    }
