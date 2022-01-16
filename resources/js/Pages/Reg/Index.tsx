import React from 'react'
import WorkerList from '@/js/components/Example'

interface Props {
  data: Array<string>
  user: {
    name: string
  }
}
const Reg: React.VFC<Props> = (props) => {
  return (
    <>
      <p>{props.user.name}</p>
      <WorkerList workerArr={props.data} />
    </>
  )
}

export default Reg
