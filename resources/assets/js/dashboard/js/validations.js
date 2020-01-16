// $(document).ready(function () {
//     "use strict";
//
//     // jQuery.validator.addMethod("lettersonlys", function(value, element) {
//     //     return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
//     // },'This  field accepts only characters');
//     //
//     // jQuery.validator.addMethod("alphanumeric", function(value, element) {
//     //     return this.optional(element) || /^[\w.]+$/i.test(value);
//     // }, "Letters, numbers, and underscores only please");
//
//    // validate personal account form
//
//     $('#company-form').validate({
//         errorElement : 'span',
//         rules:{
//             company_name: {
//                 'required' : true,
//                 'alphanumeric' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//
//             },
//             website: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//                 'alphameric' :  true
//
//             },
//             industry_type: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//
//             },
//             company_profile: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '100',
//                 'maxlength' : '200',
//
//             },
//             policies: {
//                 'required' : true,
//                 'alphanumeric' : true,
//                 'minlength' : '100',
//                 'maxlength' : '20',
//
//             },
//             logo: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//             },
//
//             name: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '5',
//                 'maxlength' : '50',
//
//             },
//             phone1: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '10',
//                 'digits' : true,
//             },
//             phone2: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '10',
//                 'digits' : true,
//             },
//             title: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '10',
//                 'maxlength' : '20',
//
//             },
//             address: {
//                 'required' : true,
//                 'alphanumeric' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//
//             },
//
//             email: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//                 'email'      : true,
//             },
//             password: {
//                 'required' : true,
//                 'minlength' : '6',
//                 'maxlength' : '20',
//             },
//             password_confirmation: {
//                 'required' : true,
//                 'equalTo' : '#password',
//             },
//
//         },
//         messages: {
//
//             name: {
//                 'required': 'Name is required',
//                 'minlength': 'Please name should be at least (5) characters',
//                 'maxlength': 'Please name is too long.more than (50) characters',
//
//             },
//             phone1: {
//                 'required': 'Phone1  is required',
//                 'minlength': 'Enter valid phone number',
//                 'maxlength': 'Enter valid phone number',
//                 'digits': 'Enter valid phone number',
//             },
//             phone2: {
//                 'required': 'Phone2 is required',
//                 'minlength': 'Enter valid phone number',
//                 'maxlength': 'Enter valid phone number',
//                 'digits': 'Enter valid phone number',
//                 title: {
//                     'required': 'Job title is required',
//                     'minlength': 'Name should be at least (10) characters',
//                     'maxlength': 'Please name is too long.more than (20) characters',
//
//                 },
//                 website: {
//                     'required': 'website  is required',
//                     'minlength': 'website should be at least (10) characters',
//                     'maxlength': 'website is too long.more than (20) characters',
//
//                 },
//                 policies: {
//                     'required': 'Policy title is required',
//                     'minlength': 'Name should be at least (100) characters',
//                     'maxlength': 'Please name is too long.more than (200) characters',
//
//                 },
//                 industry_type: {
//                     'required': ' Industry type  is required',
//                     'minlength': 'Industry type should be at least (10) characters',
//                     'maxlength': 'Industry type is too long.more than (50) characters',
//
//                 },
//                 company_profile: {
//                     'required': 'Profile  is required',
//                     'minlength': 'Profile should be at least (100) characters',
//                     'maxlength': 'Please name is too long.more than (200) characters',
//
//                 },
//                 company_name: {
//                     'required': 'Company name  is required',
//                     'minlength': 'Company name should be at least (10) characters',
//                     'maxlength': 'Company name is too long.more than (50) characters',
//
//                 },
//                 address: {
//                     'required': 'Address  is required',
//                     'minlength': 'Address should be at least (10) characters',
//                     'maxlength': 'Please name is too long.more than (50) characters',
//
//                 },
//                  logo:{
//                     'required': 'Logo is required',
//                     // 'minlength': 'Name should be at least (100) characters',
//                     // 'maxlength': 'Please name is too long.more than (200) characters',
//                     'accept': 'Select a valid image file',
//                 },
//
//                 email: {
//                     'required': 'Email is required',
//                     'minlength': 'Emial should be at least (10) characters',
//                     'maxlength': 'Please email is too long.more than (50) characters',
//                 },
//                 password: {
//                     'required': 'Password is required',
//                     'minlength': 'Password should be at least (6) characters',
//                     'maxlength': 'Please password is too long.more than (20) characters',
//                 },
//                 password_confirmation: {
//                     'required': 'Please confirm password',
//                     'EqualTo': 'Password does not match',
//                 },
//             },
//         },
//
//         highlight :function (element) {
//             //add a error class to the  element
//             $(element).addClass('has-error');
//         },
//         unhighlight : function (element) {
//             $(element).removeClass('has-error');
//         }
//
//     });
//
//
//     // validate organization form
//
//     $('#media-house-form').validate({
//         errorElement : 'span',
//         rules:{
//             company_name: {
//                 'required' : true,
//                 'alphanumeric' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//
//             },
//             website: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//                 'alphameric' :  true
//
//             },
//             industry_type: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//
//             },
//             company_profile: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '100',
//                 'maxlength' : '200',
//
//             },
//             policies: {
//                 'required' : true,
//                 'alphanumeric' : true,
//                 'minlength' : '100',
//                 'maxlength' : '20',
//
//             },
//             logo: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//             },
//
//             name: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '5',
//                 'maxlength' : '50',
//
//             },
//             phone1: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '10',
//                 'digits' : true,
//             },
//             phone2: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '10',
//                 'digits' : true,
//             },
//             title: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '10',
//                 'maxlength' : '20',
//
//             },
//             address: {
//                 'required' : true,
//                 'alphanumeric' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//
//             },
//
//             email: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//                 'email'      : true,
//             },
//             password: {
//                 'required' : true,
//                 'minlength' : '6',
//                 'maxlength' : '20',
//             },
//             password_confirmation: {
//                 'required' : true,
//                 'equalTo' : '#password',
//             },
//
//         },
//         messages: {
//
//             name: {
//                 'required': 'Name is required',
//                 'minlength': 'Please name should be at least (5) characters',
//                 'maxlength': 'Please name is too long.more than (50) characters',
//
//             },
//             phone1: {
//                 'required': 'Phone1  is required',
//                 'minlength': 'Enter valid phone number',
//                 'maxlength': 'Enter valid phone number',
//                 'digits': 'Enter valid phone number',
//             },
//             phone2: {
//                 'required': 'Phone2 is required',
//                 'minlength': 'Enter valid phone number',
//                 'maxlength': 'Enter valid phone number',
//                 'digits': 'Enter valid phone number',
//                 title: {
//                     'required': 'Job title is required',
//                     'minlength': 'Name should be at least (10) characters',
//                     'maxlength': 'Please name is too long.more than (20) characters',
//
//                 },
//                 website: {
//                     'required': 'website  is required',
//                     'minlength': 'website should be at least (10) characters',
//                     'maxlength': 'website is too long.more than (20) characters',
//
//                 },
//                 policies: {
//                     'required': 'Policy title is required',
//                     'minlength': 'Name should be at least (100) characters',
//                     'maxlength': 'Please name is too long.more than (200) characters',
//
//                 },
//                 industry_type: {
//                     'required': ' Industry type  is required',
//                     'minlength': 'Industry type should be at least (10) characters',
//                     'maxlength': 'Industry type is too long.more than (50) characters',
//
//                 },
//                 company_profile: {
//                     'required': 'Profile  is required',
//                     'minlength': 'Profile should be at least (100) characters',
//                     'maxlength': 'Please name is too long.more than (200) characters',
//
//                 },
//                 company_name: {
//                     'required': 'Company name  is required',
//                     'minlength': 'Company name should be at least (10) characters',
//                     'maxlength': 'Company name is too long.more than (50) characters',
//
//                 },
//                 address: {
//                     'required': 'Address  is required',
//                     'minlength': 'Address should be at least (10) characters',
//                     'maxlength': 'Please name is too long.more than (50) characters',
//
//                 },
//                 logo:{
//                     'required': 'Logo is required',
//                     // 'minlength': 'Name should be at least (100) characters',
//                     // 'maxlength': 'Please name is too long.more than (200) characters',
//                     'accept': 'Select a valid image file',
//                 },
//
//                 email: {
//                     'required': 'Email is required',
//                     'minlength': 'Emial should be at least (10) characters',
//                     'maxlength': 'Please email is too long.more than (50) characters',
//                 },
//                 password: {
//                     'required': 'Password is required',
//                     'minlength': 'Password should be at least (6) characters',
//                     'maxlength': 'Please password is too long.more than (20) characters',
//                 },
//                 password_confirmation: {
//                     'required': 'Please confirm password',
//                     'EqualTo': 'Password does not match',
//                 },
//             },
//         },
//
//         highlight :function (element) {
//             //add a error class to the  element
//             $(element).addClass('has-error');
//         },
//         unhighlight : function (element) {
//             $(element).removeClass('has-error');
//         }
//
//     });
//
//
//           // validate personal account form
//     $('#personal-account-form').validate({
//         errorElement : 'span',
//         rules:{
//             name: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '5',
//                 'maxlength' : '50',
//
//             },
//             phone1: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '10',
//                 'digits' : true,
//             },
//             phone2: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '10',
//                 'digits' : true,
//             },
//             title: {
//                 'required' : true,
//                 'lettersonlys' : true,
//                 'minlength' : '10',
//                 'maxlength' : '20',
//
//             },
//             address: {
//                 'required' : true,
//                 'alphanumeric' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//
//             },
//
//             email: {
//                 'required' : true,
//                 'minlength' : '10',
//                 'maxlength' : '50',
//                 'email'      : true,
//             },
//             password: {
//                 'required' : true,
//                 'minlength' : '6',
//                 'maxlength' : '20',
//             },
//             password_confirmation: {
//                 'required' : true,
//                 'equalTo' : '#password',
//             },
//
//         },
//         messages: {
//
//             name: {
//                 'required': 'Name is required',
//                 'minlength': 'Please name should be at least (5) characters',
//                 'maxlength': 'Please name is too long.more than (50) characters',
//
//             },
//             phone1: {
//                 'required': 'Phone1  is required',
//                 'minlength': 'Enter valid phone number',
//                 'maxlength': 'Enter valid phone number',
//                 'digits': 'Enter valid phone number',
//             },
//             phone2: {
//                 'required': 'Phone2 is required',
//                 'minlength': 'Enter valid phone number',
//                 'maxlength': 'Enter valid phone number',
//                 'digits': 'Enter valid phone number',
//                 title: {
//                     'required': 'Job title is required',
//                     'minlength': 'Name should be at least (10) characters',
//                     'maxlength': 'Please name is too long.more than (20) characters',
//
//                 },
//
//                 address: {
//                     'required': 'Address  is required',
//                     'minlength': 'Address should be at least (10) characters',
//                     'maxlength': 'Please name is too long.more than (50) characters',
//
//                 },
//
//
//                 email: {
//                     'required': 'Email is required',
//                     'minlength': 'Emial should be at least (10) characters',
//                     'maxlength': 'Please email is too long.more than (50) characters',
//                 },
//                 password: {
//                     'required': 'Password is required',
//                     'minlength': 'Password should be at least (6) characters',
//                     'maxlength': 'Please password is too long.more than (20) characters',
//                 },
//                 password_confirmation: {
//                     'required': 'Please confirm password',
//                     'EqualTo': 'Password does not match',
//                 },
//             },
//         },
//
//         highlight :function (element) {
//             //add a error class to the  element
//             $(element).addClass('has-error');
//         },
//         unhighlight : function (element) {
//             $(element).removeClass('has-error');
//         }
//
//     });
//
//
// });