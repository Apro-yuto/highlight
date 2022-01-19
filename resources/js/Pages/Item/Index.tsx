import React from 'react'
import WorkerList from '@/js/components/Example'
import Stack from '@mui/material/Stack'
import SearchForm from '../../components/SearchForm'

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
      <Stack spacing={1} direction="row">
        <SearchForm searchParams={props.data} />
      </Stack>
      <WorkerList workerArr={props.data} />
    </>
  )
}

export default Reg
