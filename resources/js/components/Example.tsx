import React from 'react'

const WorkerList: React.VFC = (props: Object) => {
  const ListDOM = props.workerArr.map((item: String, id: number) =>
    <li key={id}>{item}</li>
  )

  return (
    <ul>{ListDOM}</ul>
  )
}


export default WorkerList