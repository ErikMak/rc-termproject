import type {SignupFormType} from "@/types/ISignupForm";
import {ValidationService} from "@/services/ValidationService";
import {BaseValidation} from "@/mixins/BaseValidationMixins";

type SignupFormErrors = SignupFormType

export class UseSignupValidation extends BaseValidation<SignupFormErrors>{
    constructor() {
        super({
            login: '',
            pass: '',
            confirm_pass: ''
        });
    }

    checkLogin(context: any) : boolean {
        const rv_username = /^(?=.{1,30}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/

        return ValidationService.checkField({
            context: context,
            regex: rv_username,
            ref: 'login',
            errorMessage: 'Некорректный логин!'
        });
    }

    checkPass(context: any) : boolean{
        const rv_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,30}$/;

        return ValidationService.checkField({
            context: context,
            regex: rv_password,
            ref: 'pass',
            errorMessage: 'Некорректный пароль!'
        });
    };

    checkConfirmPass(context: any) : boolean {
        let valid = false;

        if (context.confirm_pass === "") {
            this.errors.value.confirm_pass = 'Подтвердите пароль!';
        } else if (context.confirm_pass !== context.pass) {
            this.errors.value.confirm_pass = 'Пароль не соответствует!';
        } else {
            this.errors.value.confirm_pass = '';
            valid = true;
        }

        return valid;
    };
}