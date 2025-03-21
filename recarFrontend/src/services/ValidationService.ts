export class ValidationService {
    static checkField({
                          context,
                          regex,
                          ref,
                          errorMessage
                      }: { context: any; regex: RegExp; ref: string; errorMessage: string }) {
        let valid = false

        if(context[ref] != "" && regex.test(context[ref])) {
            valid = true
            context.errors[ref] = ''
        } else {
            context.errors[ref] = errorMessage
        }

        return valid
    }
}