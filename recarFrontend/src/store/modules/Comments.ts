import type {CommentsStateType} from "@/store/interfaces/IComments";
import type { CommentType } from "@/types/ICommentData";
import Api from "@/common/comments"
export default {
    state: (): CommentsStateType => ({
        comments: []
    }),
    mutations: {
        updateComments(state: CommentsStateType, data: CommentType[]) : void {
            state.comments = data
        },
        pushComment(state: CommentsStateType, data: CommentType) : void {
            state.comments.push(data)
        }
    },
    actions: {
        uploadComments(ctx: any, model_id: string) : void {
            Api.getCarComments({model_id: model_id}, (res: ResponseType) => {
                ctx.commit('updateComments', res["data"])
            })
        }
    },
    getters: {
        getComments(state: CommentsStateType) : CommentType[] {
            return state.comments
        }
    }
}