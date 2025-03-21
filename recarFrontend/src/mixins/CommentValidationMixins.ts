import {BaseValidation} from "@/mixins/BaseValidationMixins";

interface CommentsFormErrors {
    text: string
}

export class UseCommentValidation extends BaseValidation<CommentsFormErrors> {
    constructor() {
        super({
            text: ''
        });
    }

    checkCommentText(context: any) : boolean {
        const rv_text = /^[a-zA-Zа-яА-Я0-9\s\.,!?()-]{1,500}$/;
        let valid = false

        if(context.text == '') {
            this.errors.value.text = 'Комментарий не может быть пустым!'
        } else if (!rv_text.test(context.text)) {
            this.errors.value.text = 'Присутсвуют недоспутимые символы или длина комментария превышает 500 символов!'
        } else {
            valid = true
            this.errors.value.text = ''
        }

        return valid
    }
}