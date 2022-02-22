interface ItemStatuses {
  [item_staatus_id: string]: {
    status_id: StatusIds
    status_name: StatusNames
    is_error: boolean
  }
}
export type StatusIds =
  | '1'
  | '2'
  | '3'
  | '4'
  | '5'
  | '6'
  | '7'
  | '11'
  | '21'
  | '31'
  | '41'
  | '51'
  | '61'
  | '99'
export type StatusNames =
  | '発注済'
  | '入荷済'
  | '出品済'
  | '受注済'
  | '入金済'
  | '出荷済'
  | '販売完了'
  | '未入荷'
  | '出品準備中'
  | '未売却'
  | '未入金'
  | '出荷トラブル'
  | '取引未完了'
  | 'クローゼット'

export default ItemStatuses
