<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Doctor врач
 *
 * @property int $Id Уникальный идентификатор специалиста
 * @property string $Name Фамилия, имя и отчество специалиста
 * @property string $Alias Уникальный Alias врача
 * @property string $AddPhoneNumber Доп. номер телефона
 * @property float $Rating Рейтинг ДокДок врача
 * @property float $InternalRating Внутренний рейтинг ДокДок врача
 * @property int $Price Стоимость первичного приёма
 * @property int $SpecialPrice Специальная стоимость приёма
 * @property int $Sex Пол специалиста
 * @property string $Img Адрес фотографии специалиста
 * @property int $OpinionCount Число отзывов
 * @property string $TextAbout Информация о враче
 * @property int $ExperienceYear Стаж специалиста
 * @property boolean $Departure Выезд домой
 * @property string $Category Категория врача (e.g. "1-я категория")
 * @property string $TextEducation Образование
 * @property string $TextAssociation Ассоциация
 * @property string $TextDegree Ученая степень
 * @property string $TextSpec
 * @property string $TextCourse
 * @property string $TextExperience
 * @property string $Degree Ученая степень
 * @property string $Description Описание
 * @property string $Rank
 * @property string $Extra Признак того, что данный врач из добивки (null / geo / best)
 * @property boolean $isActive
 * @property string $KidsReception
 *
 * @property array $ClinicsInfo Массив c информацией по клиникам
 * @property array $Clinics Массив c клиниками
 * @property array $BookingClinics Массив c клиниками для записи
 * @property Spec[] $Specialities Массив специальностей, как в соответствующем запросе
 * @property Metro[] $Stations Массив станций метро, на которых специалист преимущественно ведет свою деятельность
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Doctor extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            'Id',
            'Alias',
            'Name',
            'AddPhoneNumber',
            'Rating',
            'InternalRating',
            'Price',
            'SpecialPrice',
            'Sex',
            'Img',
            'OpinionCount',
            'TextAbout',
            'ExperienceYear',
            'Departure',
            'Category',
            'Degree',
            'Description',
            'Rank',
            'Clinics',
            'BookingClinics',
            'ClinicsInfo',
            'Specialities',
            'isActive',
            'Stations',
            'Extra',
            'KidsReception',
            'stations',
            'TextEducation',
            'TextAssociation',
            'TextSpec',
            'TextDegree',
            'TextCourse',
            'TextExperience',
        ];
    }
}
