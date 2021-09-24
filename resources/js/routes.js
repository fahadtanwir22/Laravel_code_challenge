import Owners from './components/Owners.vue';
import Addresses from './components/Addresses.vue';
import Cars from './components/Cars.vue';
import ViewOwner from './components/ViewOwner.vue';
import DeleteOwner from './components/DeleteOwner.vue';
import EditOwner from './components/EditOwner.vue';
import ViewAddress from './components/ViewAddress.vue';
import EditAddress from './components/EditAddress.vue';
import DeleteAddress from './components/DeleteAddress.vue';
import ViewCar from './components/ViewCar.vue';
import EditCar from './components/EditCar.vue';
import DeleteCar from './components/DeleteCar.vue';


export const routes = [
    {
        name: 'owners',
        path: '/owners',
        component: Owners
    },
    {
        name: 'owners',
        path: '/owners',
        component: Owners
    },
    {
        name: 'owners-show',
        path: '/owners/show/:id',
        component: ViewOwner
    },
    {
        name: 'owners-delete',
        path: '/owners/delete/:id',
        component: DeleteOwner
    },
    {
        name: 'owners-edit',
        path: '/owners/edit/:id',
        component: EditOwner
    },
    {
        name: 'addresses',
        path: '/addresses',
        component: Addresses
    },
    {
        name: 'address-show',
        path: '/address/show/:id',
        component: ViewAddress
    },
    {
        name: 'address-delete',
        path: '/address/delete/:id',
        component: DeleteAddress
    },
    {
        name: 'address-edit',
        path: '/address/edit/:id',
        component: EditAddress
    },
    {
        name: 'cars',
        path: '/cars',
        component: Cars
    },
    {
        name: 'car-show',
        path: '/car/show/:id',
        component: ViewCar
    },
    {
        name: 'car-delete',
        path: '/car/delete/:id',
        component: DeleteCar
    },
    {
        name: 'car-edit',
        path: '/car/edit/:id',
        component: EditCar
    },
];
