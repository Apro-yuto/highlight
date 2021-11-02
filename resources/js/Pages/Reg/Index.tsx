import React from 'react'
import WorkerList from '@/js/components/Example'

interface Props {
  data: Array<string>
}
const Reg:React.VFC<Props> = (props) => {
  return (
    <>
      <WorkerList workerArr={props.data} />
    </>
  )
}

export default Reg
