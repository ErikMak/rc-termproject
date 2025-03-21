import {ref} from "vue";

export abstract class BaseValidation<T> {
    protected errors

    protected constructor(initialErrors: T) {
        this.errors = ref(initialErrors);
    }

    getErrors() {
        return this.errors;
    }
}