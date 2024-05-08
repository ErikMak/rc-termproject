interface Comment {
    created_at: string,
    id: number,
    rating: string,
    text: string,
    user: string
}

export type {Comment as CommentType}