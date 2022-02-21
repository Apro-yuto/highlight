import ItemStatuses from '@/js/Types/Item/ItemStatuses'

const ITEM_STATUSES: ItemStatuses = {
  1: {
    status_id: '1',
    status_name: '発注済',
    is_error: false,
  },
  2: {
    status_id: '2',
    status_name: '入荷済',
    is_error: false,
  },
  3: {
    status_id: '3',
    status_name: '出品済',
    is_error: false,
  },
  4: {
    status_id: '4',
    status_name: '受注済',
    is_error: false,
  },
  5: {
    status_id: '5',
    status_name: '入金済',
    is_error: false,
  },
  6: {
    status_id: '6',
    status_name: '出荷済',
    is_error: false,
  },
  7: {
    status_id: '7',
    status_name: '販売完了',
    is_error: false,
  },
  11: {
    status_id: '11',
    status_name: '未入荷',
    is_error: true,
  },
  21: {
    status_id: '21',
    status_name: '出品準備中',
    is_error: true,
  },
  31: {
    status_id: '31',
    status_name: '未売却',
    is_error: true,
  },
  41: {
    status_id: '41',
    status_name: '未入金',
    is_error: true,
  },
  51: {
    status_id: '51',
    status_name: '出荷トラブル',
    is_error: true,
  },
  61: {
    status_id: '61',
    status_name: '取引未完了',
    is_error: true,
  },
  99: {
    status_id: '99',
    status_name: 'クローゼット',
    is_error: true,
  },
}

export default ITEM_STATUSES
