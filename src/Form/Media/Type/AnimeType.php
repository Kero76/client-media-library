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
    use Symfony\Component\Validator\Constraints\Regex;

    class AnimeType extends AbstractType {
    
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
                ->add('title', TextType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank(),
                    ),
                ))
                ->add('originalTitle', TextType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new NotBlank(),
                    ),
                ))
                ->add('releaseDate', DateType::class, array(
                    'required' => true,
                    'widget' => 'single_text',
                ))
                ->add('endDate', DateType::class, array(
                    'required' => true,
                    'widget' => 'single_text',
                ))
                ->add('numberOfSeasons', NumberType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Range(array(
                            'min' => 0,
                        )),
                    ),
                ))
                ->add('currentSeason', NumberType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Range(array(
                            'min' => 0,
                        )),
                    ),
                ))
                ->add('averageEpisodeRuntime', NumberType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Range(array(
                            'min' => 0,
                        )),
                    ),
                ))
                ->add('numberOfEpisode', NumberType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Range(array(
                            'min' => 0,
                        )),
                    ),
                ))
                ->add('maxEpisodes', NumberType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Range(array(
                            'min' => 0,
                        )),
                    ),
                ))
                ->add('languagesSpoken', TextType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Regex(array(
                            'pattern' => '/(([a-z]){2},).*[a-z]{2}$/',
                        )),
                    ),
                ))
                ->add('subtitles', TextType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Regex(array(
                            'pattern' => '/(^[A-Za-z][a-z]*,.*)*[a-zA-Z]$/',
                        ))
                    ),
                ))
                ->add('supports', TextType::class, array(
                    'required' => true,
                    'constraints' => array(
                        new Regex(array(
                            'pattern' => '/(((Audio|Video) Tape|DVD|Blu Ray|Paper|Vynil|CD|Digital),.*)((Audio|Video) Tape|DVD|Blu Ray|Paper|Vynil|CD|Digital)$/',
                        ))
                    ),
                ))
                ->add('genres', TextType::class, array(
                    'required' => true,
                ))
                ->add('synopsis', TextareaType::class)
                ->add('producers', TextareaType::class)
                ->add('directors', TextareaType::class);
    
            $builder->get('genres')->addModelTransformer(new StringToArrayTransformer());
            $builder->get('supports')->addModelTransformer(new StringToArrayTransformer());
            $builder->get('producers')->addModelTransformer(new StringToArrayTransformer());
            $builder->get('directors')->addModelTransformer(new StringToArrayTransformer());
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
            return 'anime-form';
        }
    }
