import type {SigninFormType} from "@/types/ISigninForm";
import {ValidationService} from "@/services/ValidationService";
import {BaseValidation} from "@/mixins/BaseValidationMixins";

type SigninFormErrors = SigninFormType
export class UseSigninValidation extends BaseValidation<SigninFormErrors>{
    constructor() {
        super({
            login: '',
            pass: ''
        });
    }

    checkLogin(context: any) : boolean {
        const rv_null = /^.+$/;

        return ValidationService.checkField({
            context: context, regex: rv_null, ref: 'login', errorMessage: 'Логин не может быть пустым!'
        })
    }

    checkPass(context: any) : boolean {
        const rv_null = /^.+$/;

        return ValidationService.checkField({
            context: context, regex: rv_null, ref: 'pass', errorMessage: 'Пароль не может быть пустым!'
        })
    }
}