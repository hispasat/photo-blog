import {Injectable} from '@angular/core';

@Injectable()
export class EnvironmentDetectorService {
    isBrowser = ():boolean => {
        return typeof (window) !== 'undefined';
    };

    isServer = ():boolean => {
        return typeof (window) === 'undefined';
    };
}
