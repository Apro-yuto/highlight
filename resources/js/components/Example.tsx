import React from 'react'

interface Props {
  workerArr: Array<string>
}
const WorkerList: React.VFC<Props> = (props) => {
  const ListDOM = props.workerArr.map((item: any, id: number) => (
    <li key={id}>{item.name}</li>
  ))

  return <ul>{ListDOM}</ul>
}

export default WorkerList
