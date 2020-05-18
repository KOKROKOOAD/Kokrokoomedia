
  export const routes = [

        {   name : 'fileupload',
            path : '/user-account/create-sub-file',
            component : require('../components/subscriptions/fileUpload')
        },

      {   name : 'transactions',
          path : '/user-account/transactions',
          component : require('../components/subscriptions/transactions')
      },
      {   name : 'profile',
          path : '/user-account/user-profile',
          component : require('../components/userProfile/userProfile')
      },
      {   name : 'home',
          path : '/user-account/dashboard',
          component : require('../components/subscriptions/home')
      },

      {
          name : 'create-rate-card',
          path : '/media-house-admin/create-rate-card',
          component : require('../components/rateCards/createRateCards')
      },

      {
          name : 'create-print-card',
          path : '/media-house-admin/create-rate-card',
          component : require('../components/subscriptions/printRateCare')
      },

      {
        name : 'edit-rate-card',
        path : '/media-house-admin/edit-rate-card',
        component : require('../components/rateCards/editRatecard')
    },


  ];

