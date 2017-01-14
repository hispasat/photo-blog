import {ModuleWithProviders} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {SignInFormComponent, SignOutComponent} from './components';

const AppRoutes:Routes = [
    {
        path: '',
        redirectTo: '/photos',
        pathMatch: 'full'
    },
    {
        path: 'signin',
        component: SignInFormComponent,
    },
    {
        path: 'signout',
        component: SignOutComponent,
    },
];

export const AppRoutingProviders:any[] = [];

export const AppRouting:ModuleWithProviders = RouterModule.forRoot(AppRoutes);
