<?php

namespace App\Exports;

use App\Models\Registration;
use App\Models\User;
use DB;
use App\AllUserList;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllUsersListExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Registration::join('subscriptions', 'subscriptions.userid', '=', 'registrations.subscriber_id')
            ->where('registrations.status', 'active')
            ->orwhere('subscriptions.amount', '3060.0000')
            ->get(['subscriptions.updated_at','registrations.entrepreneur_name','registrations.fname','registrations.mname','registrations.dob','registrations.gender','registrations.residentaddress','registrations.permanentaddress','registrations.duelnationality','registrations.country','registrations.district','registrations.postalcode','registrations.facebook','registrations.contact','registrations.email','registrations.since','registrations.bloodgroup','registrations.donateblood','registrations.nid','registrations.certificate','registrations.maritalstatus','registrations.passport','registrations.spouse_guardian','registrations.spouse_guardian_contact','registrations.occupation_spouse_guardian','registrations.children','registrations.income','registrations.joining_date','registrations.total_sale','registrations.website','registrations.product_category','registrations.totalinpost','registrations.product','registrations.company_year','registrations.turnover','registrations.monthly_order','registrations.channel','registrations.export','registrations.involvement']);
    }

    public function  headings() : array{
        return [
            'Join as Subscriber',
            'Entrepreneur’s Name',
            'Father’s Name',
            'Mother’s Name',
            'Date Of Birth',
            'Gender',
            'Resident Address',
            'Permanent Address',
            'Duel Nationality',
            'Country',
            'District',
            'Postal Code',
            'Facebook ID Link',
            'Contact Number',
            'E-Mail',
            'Facebook WE follower since',
            'Blood Group',
            'Interested in Donate Blood?',
            'National Identity/Birth Certificate Number',
            'Which on You have',
            'Marital Status',
            'Detail of Passport Number (If any)',
            'Name Of Spouse/Guardian',
            'Contact Number of Spouse/Guardian',
            'Occupation of Spouse/Guardian',
            'How Many Children do you have?',
            'Average Annual Income (Estimated)',
//            'Company Name',
//            'Office Address',
//            'Office Address District',
//            'Office Postal Code',
//            'Phone No. (Office)',
//            'Mobile (Office)',
//            'Company Email ID',
            'Website (If any)',
//            'Company Facebook Page Name',
//            'Company Facebook Page Link',
//            'Company Facebook Group Name: (if any)',
//            'Company Linked-in Link : (if any)',
            'Product Category',
            'Product Name',
            'Company Establishment Year',
            'Annual Average Turnover',
            'Monthly Average Order',
            'Business Channel',
            'Are you interested in Export?',
            'WE Involvement (Short Details)',
            'Joining Date ',
            'Total Sale from WE',
            'Total Post in WE',
//            'Name of Reference 1',
//            'Name of Reference 2',
//            'Product Category 1',
//            'Product Category 2',
//            'Product Category 3',
//            'Product Category 4',
        ];
    }
}
