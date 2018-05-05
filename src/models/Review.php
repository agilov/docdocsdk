<?php

namespace agilov\docdocsdk\models;

use agilov\docdocsdk\base\Model;

/**
 * Class Review Отзыв
 *
 * @property int $Id
 * @property string $Client
 * @property int $RatingQlf
 * @property int $RatingAtt
 * @property int $RatingRoom
 * @property string $Text
 * @property string $Date
 * @property int $DoctorId
 * @property int $ClinicId
 * @property string $Answer
 * @property string $WaitingTime
 * @property int $RatingDoctor
 * @property string $RatingClinic
 * @property boolean $TagClinicLocation
 * @property boolean $TagClinicService
 * @property boolean $TagClinicCost
 * @property boolean $TagClinicRecommend
 * @property boolean $TagDoctorAttention
 * @property boolean $TagDoctorExplain
 * @property boolean $TagDoctorQuality
 * @property boolean $TagDoctorRecommend
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Review extends Model
{
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            "Id",
            "Client",
            "RatingQlf",
            "RatingAtt",
            "RatingRoom",
            "Text",
            "Date",
            "DoctorId",
            "ClinicId",
            "Answer",
            "WaitingTime",
            "RatingDoctor",
            "RatingClinic",
            "TagClinicLocation",
            "TagClinicService",
            "TagClinicCost",
            "TagClinicRecommend",
            "TagDoctorAttention",
            "TagDoctorExplain",
            "TagDoctorQuality",
            "TagDoctorRecommend"
        ];
    }
}
